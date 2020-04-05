<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
 */

namespace Formundzeichen\ContaoCookieConsentBundle;

use Contao\System;
use Contao\Backend;

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

            default:
                // clear session on default
                $objSession->set($this->strSession,[]);
                break;
        }

        // footer
        $this->Template->version = '<a href="https://github.com/ckarisch/ContaoCookieConsentBundle" target="_blank">Cookie Consent Version ' . FZ_COOKIE_CONSENT_VERSION . '</a>';
    }

}