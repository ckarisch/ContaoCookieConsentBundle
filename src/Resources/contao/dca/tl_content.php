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
        '{type_legend},type;{fz_html_legend},html'
    ;
}
else {
    $GLOBALS['TL_DCA']['tl_content']['palettes']['fz_cookie_consent_html_loader'] =
        '{type_legend},type;{fz_cookie_consent_only_premium}'
    ;
}