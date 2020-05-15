<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 */

namespace Formundzeichen\ContaoCookieConsentBundle;

use Contao\System;
use Contao\Backend;
use ContaoBackendMessages;

/**
 * Class ModuleCookieConsent
 */
class ModuleCookieConsent extends \BackendModule
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_cookie_consent';

  	/**
  	 * The session name
  	 * @var string
  	 */
  	protected $strSession = 'fz_cookie_consent';

    /**
     * Function compile
     */
    protected function compile()
    {
        $license = \Config::get('fzCookiesLicense');
        $licenseLevel = \Config::get('fzCookiesLicenseLevel');

        switch ($licenseLevel) {
            case 1:
                $licenseName = 'Standard Lizenz';
                break;
            case 2:
                $licenseName = 'Premium Lizenz';
                break;
            default:
                $licenseName = 'Standard Lizenz';
                break;
            }
        $this->Template->licenseName = $licenseName;
        $this->Template->license = $license . " _ how";
        $this->Template->results = array();

		$objSession = System::getContainer()->get('session');
		$arrSession = $objSession->get($this->strSession);

        switch( \Input::get('state') ) {
            case 'copy':
                $this->Template->results = CopyTemplates::run( );
                $arrSession['results'] = $this->Template->results;
      					$objSession->set($this->strSession,$arrSession);

                $this->redirect( Backend::addToUrl('state=copying-done') );
          		return;

            case 'copying-done':
                // do not clear session

                // show session variables
                if($arrSession['results']) {
                  $this->Template->results = $arrSession['results'];
                }
                break;

            case 'set-key':
                $key = \Input::post('licenseKey');
                \Config::persist('fzCookiesLicense', $key);

                $bm = new \Formundzeichen\ContaoCookieConsentBundle\ContaoBackendMessages();
                $bm->checkLicense($key, false);

                $this->redirect( Backend::addToUrl('state=set-key-done') );
                return;

            case 'set-key-done':
                $this->Template->setKeyMessage = 'Key gespeichert';
                break;

            default:
                // clear session on default
                $objSession->set($this->strSession,[]);
                break;
        }

        // footer
        $this->Template->version = '<a href="https://github.com/ckarisch/ContaoCookieConsentBundle" target="_blank">Cookie Consent Version ' . FZ_COOKIE_CONSENT_VERSION . '</a>';
    }

}