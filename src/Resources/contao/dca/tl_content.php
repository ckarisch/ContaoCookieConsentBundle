<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 */

$licenseLevel = \Config::get('fzCookiesLicenseLevel');

// premium
if($licenseLevel >=2 ) {
    $GLOBALS['TL_DCA']['tl_content']['palettes']['fz_cookie_consent_html_loader'] =
        '{type_legend},type;{fz_html_legend},html,fz_cookie_consent_cookie_level'
    ;
}
else {
    $GLOBALS['TL_DCA']['tl_content']['palettes']['fz_cookie_consent_html_loader'] =
        '{type_legend},type;{fz_cookie_consent_only_premium}'
    ;
}


$GLOBALS['TL_DCA']['tl_content']['fields']['fz_cookie_consent_cookie_level'] = [
	'label' => &$GLOBALS['TL_LANG']['tl_content']['fz_cookie_consent_cookie_level'],
	'exclude' => true,
	'inputType' => 'select',
    'options' => [
        0 => 'Immer anzeigen',
        1 => 'Erforderliche Cookies',
        2 => 'Erweiterte Cookies',
        3 => 'Analyse-Cookies',
        4 => 'Nicht anzeigen'
    ],
    'eval' => ['isAssociative' => true],
	'sql' => "int"
];