<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 */

namespace Formundzeichen\ContaoCookieConsentBundle;

use Contao\BackendTemplate;
use Contao\Files;
use Contao\File;

class ContaoBackendMessages extends \Backend
{
    public function __construct()
    {
        parent::__construct();
        \BackendUser::authenticate();
    }


    public function getContaoBackendMessages()
    {
        $GLOBALS['TL_CSS'][] = 'bundles/contaocookieconsent/css/backendmessages.min.css|all';
        $template = new BackendTemplate('mod_cookie_consent_backend_message');

        $messages = array();

        $templateErrors = $this->checkTemplates();
        if(!empty($templateErrors))
        {
            $messages[] = (object) array(
              'heading' => 'Contao Cookie Consent',
              'content' => 'Das Plugin ist nicht vollständig eingerichtet.',
              'footer' => '<a class="tl_submit" target="_blank" rel="noopener" href="https://www.formundzeichen.at/plugin/contao-cookie-popup.html">Installationsanleitung</a>'
            );

            $messages[] = (object) array(
              'error' => true,
              'heading' => 'Template Fehler',
              'content' => 'Die folgenden Templates wurden nicht gefunden. Dieser Fehler kann durch den Import der Standardtemplates behoben werden.',
              'list' => $templateErrors,
              'footer' => '<a class="tl_submit" href="/contao?do=Cookies">Template Import</a>'
            );
        }

        // $licenseInfo = $this->checkLicense();
        // if(isset($licenseInfo))
        // {
        //     $messages[] = (object) array(
        //       'error' => false,
        //       'heading' => $licenseInfo['heading'],
        //       'content' => $licenseInfo['content'],
        //       'footer' => ''
        //     );
        // }

        $template->messages = $messages;

        return $template->parse();
    }

    private function checkTemplates() {
        $errors = array();

        $strFolder = 'vendor/formundzeichen/contao-cookie-consent-bundle/src/Resources/frontendTemplates';
        $strDestinationFolder = 'templates';
        $objFiles = Files::getInstance();

				$arrFolders = scan(TL_ROOT.'/'.$strFolder);

				foreach($arrFolders as $f)
				{
  					$strSource = $strFolder.'/'.$f;
  					$strDestination = $strDestinationFolder.'/'.$f;
            $fileExists = file_exists(TL_ROOT.'/'.$strDestination);

  					if(!$fileExists) {
                $errors[] = $f;
            }
				}

        return $errors;
    }

    public function checkLicense($key = '', $checkTime = true) {
        $license = \Config::get('fzCookiesLicense');
        $licenseLevel = \Config::get('fzCookiesLicenseLevel');
        $nextCheck = \Config::get('fzCookiesNextLicenseCheck');

        if(isset($key)) {
            $api = 'checkKey';
        }
        else {
            $api = 'getKey';
        }

        $domain = $_SERVER['SERVER_NAME'];

        if(!isset($nextCheck)) {
            $nextCheck = 0;
        }

        if(!$checkTime || $nextCheck < time())
        {
            $url = 'https://shop.formundzeichen.at/api/' . $api;

            $data = $this->callAPI('POST', $url, json_encode(array(
                'domain' => $domain,
                'app' => 'fz-contao-cookie-consent-bundle',
                'key' => isset($key) ? $key : ''
            ), JSON_FORCE_OBJECT));

            if($data) {
                $json = json_decode($data, true);

                $license = $json['key'];
                $licenseLevel = $json['licenseLevel'];
                $keyValid = $json['keyValid'];

                if(!$keyValid) {
                    \Config::persist('fzCookiesLicenseLevel', 1);
                }
                else {
                    if($license) {
            		      \Config::persist('fzCookiesLicense', $license);
                      }

              		\Config::persist('fzCookiesLicenseLevel', $licenseLevel);
                }
                \Config::persist('fzCookiesNextLicenseCheck', time() + (3600));
            }
        }

        if ($licenseLevel >= 2)
        {
            return array(
                'heading' => 'Cookie Popup Premium',
                'content' => 'Premium Lizenz ist aktiv. Alle Funktionen sind aktiviert.'
            );
        }
        return array(
            'heading' => 'Cookie Popup Standard',
            'content' => 'Standard Lizenz ist aktiv. Diese Lizenz kann kostenlos auf beliebig vielen Domains verwendet werden. <br />Weitere Informationen finden Sie in der <a href="https://www.formundzeichen.at/plugin/contao-cookie-popup.html">Cookie Popup Anleitung</a>'
        );
    }

    private function callAPI($method, $url, $data){
       $curl = curl_init();
       switch ($method){
          case "POST":
             curl_setopt($curl, CURLOPT_POST, 1);
             if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
             break;
          case "PUT":
             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
             if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
             break;
          default:
             if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
       }
       // OPTIONS:
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
       ));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
       // EXECUTE:
       $result = curl_exec($curl);
       if(!$result){ return false; }
       curl_close($curl);
       return $result;
    }

}