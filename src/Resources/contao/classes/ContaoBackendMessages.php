<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
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

}