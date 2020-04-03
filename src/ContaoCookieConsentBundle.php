<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
 */

namespace Formundzeichen\ContaoCookieConsentBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use Contao\FrontendTemplate;
use Contao\TemplateLoader;

class ContaoCookieConsentBundle extends Bundle
{
  /**
     * Create the  template.
     *
     * @param array  $data
     * @param string $name
     *
     * @return FrontendTemplate
     */
    public function createTemplate(array $data, $name = 'mod_cookieconsent1')
    {
        // get default config
        $defaults = $this->getDefaults();

        $template = new FrontendTemplate($name);
        $template->cssFiles = $this->getCssFiles($name);

        // Cookie name
        $template->cookie = sprintf('FZ_COOKIECONSENT_%s', $data['id']);

        // imprint and privacy pages
        $imprintPage = \PageModel::findWithDetails($GLOBALS['TL_CONFIG']['fzCookiesImprintPage']);
        $privacyPage = \PageModel::findWithDetails($GLOBALS['TL_CONFIG']['fzCookiesPrivacyPage']);

        $imprintPageUrl = $imprintPage ? $imprintPage->getAbsoluteUrl() : $defaults["fzCookiesImprintPage"];
        $privacyPageUrl = $privacyPage ? $privacyPage->getAbsoluteUrl() : $defaults["fzCookiesPrivacyPage"];

        // text array
        $template->text = array(
            'heading'  => $GLOBALS['TL_CONFIG']['fzCookiesHeading'] ? $GLOBALS['TL_CONFIG']['fzCookiesHeading'] : $defaults['fzCookiesHeading'],
            'fzCookiesImprintTitle'  => $GLOBALS['TL_CONFIG']['fzCookiesImprintTitle'] ? $GLOBALS['TL_CONFIG']['fzCookiesImprintTitle'] : $defaults['fzCookiesImprintTitle'],
            'fzCookiesPrivacyTitle'  => $GLOBALS['TL_CONFIG']['fzCookiesPrivacyTitle'] ? $GLOBALS['TL_CONFIG']['fzCookiesPrivacyTitle'] : $defaults['fzCookiesPrivacyTitle'],
            'fzCookiesCookieTitle1'  => $GLOBALS['TL_CONFIG']['fzCookiesCookieTitle1'] ? $GLOBALS['TL_CONFIG']['fzCookiesCookieTitle1'] : $defaults['fzCookiesCookieTitle1'],
            'fzCookiesCookieTitle2'  => $GLOBALS['TL_CONFIG']['fzCookiesCookieTitle2'] ? $GLOBALS['TL_CONFIG']['fzCookiesCookieTitle2'] : $defaults['fzCookiesCookieTitle2'],
            'fzCookiesCookieTitle3'  => $GLOBALS['TL_CONFIG']['fzCookiesCookieTitle3'] ? $GLOBALS['TL_CONFIG']['fzCookiesCookieTitle3'] : $defaults['fzCookiesCookieTitle3'],
            'fzCookiesCookieDescription1'  => $GLOBALS['TL_CONFIG']['fzCookiesCookieDescription1'] ? $GLOBALS['TL_CONFIG']['fzCookiesCookieDescription1'] : $defaults['fzCookiesCookieDescription1'],
            'fzCookiesCookieDescription2'  => $GLOBALS['TL_CONFIG']['fzCookiesCookieDescription2'] ? $GLOBALS['TL_CONFIG']['fzCookiesCookieDescription2'] : $defaults['fzCookiesCookieDescription2'],
            'fzCookiesCookieDescription3'  => $GLOBALS['TL_CONFIG']['fzCookiesCookieDescription3'] ? $GLOBALS['TL_CONFIG']['fzCookiesCookieDescription3'] : $defaults['fzCookiesCookieDescription3'],
        );

        // links array
        $template->links = array(
            'fzCookiesImprintPage' => $imprintPageUrl,
            'fzCookiesPrivacyPage' => $privacyPageUrl
        );

        return $template;
    }

    private function getDefaults() {
        return array(
            'fzCookiesHeading' => 'Bitte treffen Sie eine Auswahl um fortzufahren',
            'fzCookiesImprintTitle' => 'Impressum',
            'fzCookiesImprintPage' => 'impressum.html',
            'fzCookiesPrivacyTitle' => 'Datenschutz',
            'fzCookiesPrivacyPage' => 'datenschutz.html',
            'fzCookiesCookieTitle1' => 'Erforderlich',
            'fzCookiesCookieDescription1' => 'Notwendige Cookies und Google Fonts zulassen, damit die Website korrekt funktioniert',
            'fzCookiesCookieTitle2' => 'Komfort',
            'fzCookiesCookieDescription2' => 'Es werden notwendige Cookies, Google Fonts, Google Maps, OpenStreetMap, Youtube und Social Media Liks geladen',
            'fzCookiesCookieTitle3' => 'Statistik',
            'fzCookiesCookieDescription3' => 'Es werden notwendige Cookies, Google Fonts, Google Maps, OpenStreetMap, Youtube, Social Media Liks und Google Analytics geladen'
        );
    }

    private function getCssFiles($templateName) {
      $cssFiles = array(
        'bundles/contaocookieconsent/css/font.min.css|all',
        'bundles/contaocookieconsent/css/cookieconsent.min.css|all'
      );
      switch ($templateName) {
        case 'mod_cookieconsent2':
          $cssFiles[] = 'bundles/contaocookieconsent/css/cookieconsent_template2.min.css|all';
          break;

        default:
          break;
      }
      return $cssFiles;
    }
}
