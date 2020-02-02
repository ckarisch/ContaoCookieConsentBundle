<?php
/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
 */

$GLOBALS['TL_HOOKS']['outputFrontendTemplate'][] = ['Fz\ContaoCookieConsentBundle\EventListener\TemplateListener', 'onOutputFrontendTemplate'];