<?php

/**
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
 */

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesTemplateName'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesTemplateName'],
			'inputType'               => 'select',
			'options'									=> array(
																				'mod_cookieconsent1' => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesSelect'][0],
																				'mod_cookieconsent2' => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesSelect'][1]
																	 ),
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesEnableOnPrivacyPage'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesEnableOnPrivacyPage'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesEnableOnImprintPage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesEnableOnImprintPage'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesHeading'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesHeading'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesImprintTitle'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesImprintTitle'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesImprintPage'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesImprintPage'],
			'inputType'               => 'pageTree',
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesPrivacyTitle'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesPrivacyTitle'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesPrivacyPage'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesPrivacyPage'],
			'inputType'               => 'pageTree',
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesCookieTitle1'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesCookieTitle1'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesCookieDescription1'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesCookieDescription1'],
			'inputType'               => 'textarea',
			'eval'                    => array('tl_class'=>'w50', 'rows'=>3)
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesCookieTitle2'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesCookieTitle2'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesCookieDescription2'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesCookieDescription2'],
			'inputType'               => 'textarea',
			'eval'                    => array('tl_class'=>'w50', 'rows'=>3)
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesCookieTitle3'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesCookieTitle3'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
		);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fzCookiesCookieDescription3'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fzCookiesCookieDescription3'],
			'inputType'               => 'textarea',
			'eval'                    => array('tl_class'=>'w50', 'rows'=>3)
		);

/**
 * Modify palette
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{fzCookiePopupSettings:hide},fzCookiesTemplateName,fzCookiesHeading,fzCookiesEnableOnImprintPage,fzCookiesEnableOnPrivacyPage,fzCookiesImprintTitle,fzCookiesImprintPage,fzCookiesPrivacyTitle,fzCookiesPrivacyPage,fzCookiesCookieTitle1,fzCookiesCookieDescription1,fzCookiesCookieTitle2,fzCookiesCookieDescription2,fzCookiesCookieTitle3,fzCookiesCookieDescription3';