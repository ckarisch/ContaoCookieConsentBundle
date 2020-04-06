<?php
/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
 */

define('FZ_COOKIE_CONSENT_VERSION', '1.3.5');

$GLOBALS['TL_HOOKS']['outputFrontendTemplate'][] = ['Formundzeichen\ContaoCookieConsentBundle\EventListener\TemplateListener', 'onOutputFrontendTemplate'];
$GLOBALS['TL_HOOKS']['getPageLayout'][] = ['Formundzeichen\ContaoCookieConsentBundle\EventListener\GetPageLayoutListener', 'onGetPageLayout'];

/**
 * -------------------------------------------------------------------------
 * BACK END MODULES
 * -------------------------------------------------------------------------
 */
array_insert($GLOBALS['BE_MOD']['system'], -1, array
(
	'Cookies' => array (
		'callback'   => 'Formundzeichen\ContaoCookieConsentBundle\ModuleCookieConsent',
		'stylesheet' => 'bundles/contaocookieconsent/css/backend.min.css',
	)
));