<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
 */

namespace Formundzeichen\ContaoCookieConsentBundle;


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
     * Function compile
     */
    protected function compile()
    {
        $this->Template->results = array();

        switch( \Input::get('state') ) {
            case 'copy':
                $this->Template->results = CopyTemplates::run( );
                break;
        }

        // footer
        $this->Template->version = '<a href="https://github.com/ckarisch/ContaoCookieConsentBundle" target="_blank">Cookie Consent Version ' . FZ_COOKIE_CONSENT_VERSION . '</a>';
    }

}