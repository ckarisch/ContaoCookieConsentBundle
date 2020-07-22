<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 */

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesEnablePopup'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnablePopup'],
			'inputType'               => 'select',
			'options'									=> array(
																				'default' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesDefault'],
																				'show' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][0],
																				'hide' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][1]
																	 ),
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(10) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesTemplateName'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesTemplateName'],
			'inputType'               => 'select',
			'options'									=> array(
																				'mod_cookieconsent1' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesSelect'][0],
																				'mod_cookieconsent2' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesSelect'][1]
																	 ),
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesEnableOnPrivacyPage'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableOnPrivacyPage'],
			'inputType'               => 'select',
			'options'									=> array(
																				'default' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesDefault'],
																				'show' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][0],
																				'hide' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][1]
																	 ),
			'default'					 => 'hide',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(10) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesEnableOnImprintPage'] = array
        (
        	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableOnImprintPage'],
			'inputType'               => 'select',
			'options'									=> array(
																				'default' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesDefault'],
																				'show' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][0],
																				'hide' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][1]
																	 ),
			'default'					 => 'hide',
        	'eval'                    => array('tl_class'=>'w50'),
            'sql' => "varchar(10) NULL"
        );

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesHeading'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesHeading'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesImprintTitle'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesImprintTitle'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesImprintPage'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesImprintPage'],
			'inputType'               => 'pageTree',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesPrivacyTitle'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesPrivacyTitle'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesPrivacyPage'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesPrivacyPage'],
			'inputType'               => 'pageTree',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesDisableCookieLevel2'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesDisableCookieLevel2'],
			'inputType'               => 'select',
			'options'									=> array(
																				'default' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesDefault'],
																				'show' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][0],
																				'hide' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][1]
																	 ),
			'default'					 => 'hide',
			'eval'                    => array('tl_class'=>'w50'),
            'sql' => "varchar(10) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesDisableCookieLevel3'] = array
		(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesDisableCookieLevel3'],
		'inputType'               => 'select',
		'options'									=> array(
																			'default' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesDefault'],
																			'show' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][0],
																			'hide' => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesEnableSelect'][1]
																 ),
		'default'					 => 'show',
		'eval'                    => array('tl_class'=>'w50'),
        'sql' => "varchar(10) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesCookieTitle1'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesCookieTitle1'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesCookieDescription1'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesCookieDescription1'],
			'inputType'               => 'textarea',
			'eval'                    => array('tl_class'=>'w50', 'rows'=>3),
        	'sql' => "varchar(1024) NULL",
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesCookieTitle2'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesCookieTitle2'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesCookieDescription2'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesCookieDescription2'],
			'inputType'               => 'textarea',
			'eval'                    => array('tl_class'=>'w50', 'rows'=>3),
        	'sql' => "varchar(1024) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesCookieTitle3'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesCookieTitle3'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesCookieDescription3'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesCookieDescription3'],
			'inputType'               => 'textarea',
			'eval'                    => array('tl_class'=>'w50', 'rows'=>3),
        	'sql' => "varchar(1024) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesButtonSave'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesButtonSave'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesButtonChangeSettings'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesButtonChangeSettings'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesButtonAcceptAll'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesButtonAcceptAll'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

$GLOBALS['TL_DCA']['tl_page']['fields']['fzCookiesButtonBack'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fzCookiesButtonBack'],
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
        	'sql' => "varchar(256) NULL"
		);

/**
 * Modify palette
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] .= ';{fzCookiePopupSettings:hide},fzCookiesEnablePopup,fzCookiesTemplateName,fzCookiesHeading,fzCookiesEnableOnImprintPage,fzCookiesEnableOnPrivacyPage,fzCookiesImprintTitle,fzCookiesImprintPage,fzCookiesPrivacyTitle,fzCookiesPrivacyPage,fzCookiesDisableCookieLevel2,fzCookiesDisableCookieLevel3,fzCookiesCookieTitle1,fzCookiesCookieDescription1,fzCookiesCookieTitle2,fzCookiesCookieDescription2,fzCookiesCookieTitle3,fzCookiesCookieDescription3,fzCookiesButtonSave,fzCookiesButtonChangeSettings,fzCookiesButtonAcceptAll,fzCookiesButtonBack';