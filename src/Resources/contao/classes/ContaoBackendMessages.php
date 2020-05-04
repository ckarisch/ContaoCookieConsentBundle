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

        $licenseInfo = $this->checkLicense();
        if(isset($licenseInfo))
        {
            $messages[] = (object) array(
              'error' => false,
              'heading' => $licenseInfo['heading'],
              'content' => $licenseInfo['content'],
              'footer' => ''
            );
        }

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

    private function checkLicense() {
        $licenseLevel = \Config::get('fzCookiesLicenseLevel');
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

}