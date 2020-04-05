<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
 */

namespace Formundzeichen\ContaoCookieConsentBundle;

use Contao\Files;
use Contao\File;

class CopyTemplates extends \Backend
{
    public function __construct( )
    {
        parent::__construct();
        \BackendUser::authenticate();
    }


    public function run( )
    {
        $result = array();

        $strFolder = 'vendor/formundzeichen/contao-cookie-consent-bundle/src/Resources/frontendTemplates';
        $strDestinationFolder = 'templates';
        $objFiles = Files::getInstance();

				$arrFolders = scan(TL_ROOT.'/'.$strFolder);

				foreach($arrFolders as $f)
				{
					$strSource = $strFolder.'/'.$f;
					$strDestination = $strDestinationFolder.'/'.$f;
          $fileExists = file_exists(TL_ROOT.'/'.$strDestination);

					if($objFiles->copy($strSource,$strDestination) !== true)
					{
						$result[] = 'Kopieren von "'.$strSource.'" zu "'.$strDestination.'" fehgeschlagen.';
					}
          else {
						$result[] = 'Datei "'.$strDestination.'" wurde ' . ($fileExists ? 'überschrieben' : 'kopiert') . '.';
          }
				}

        return $result;
    }

}