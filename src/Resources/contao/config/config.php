<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 */

define('FZ_COOKIE_CONSENT_VERSION', '1.5.10');

$GLOBALS['TL_HOOKS']['outputFrontendTemplate'][] = ['Formundzeichen\ContaoCookieConsentBundle\EventListener\TemplateListener', 'onOutputFrontendTemplate'];
$GLOBALS['TL_HOOKS']['getSystemMessages'][] = ['Formundzeichen\ContaoCookieConsentBundle\EventListener\GetSystemMessagesListener', 'onGetSystemMessages'];
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