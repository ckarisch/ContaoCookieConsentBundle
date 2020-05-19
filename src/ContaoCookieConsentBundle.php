<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
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
        $template->maxValue = 3;
        $template->disableCookieLevel2 = $GLOBALS['TL_CONFIG']['fzCookiesDisableCookieLevel2'];
        $template->disableCookieLevel3 = $GLOBALS['TL_CONFIG']['fzCookiesDisableCookieLevel3'];

        // set max cookie value
        if($template->disableCookieLevel3) {
            $template->maxValue = 2;

            if($template->disableCookieLevel2) {
                $template->maxValue = 1;
            }
        }


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
            'fzCookiesHeading' => 'Wählen Sie Ihre Datenschutzeinstellungen',
            'fzCookiesImprintTitle' => 'Impressum',
            'fzCookiesImprintPage' => 'impressum.html',
            'fzCookiesPrivacyTitle' => 'Datenschutz',
            'fzCookiesPrivacyPage' => 'datenschutz.html',
            'fzCookiesCookieTitle1' => 'Notwendig',
            'fzCookiesCookieDescription1' => 'Mit dieser Einstellung wird zur korrekten Darstellung der Website Google Fonts geladen.',
            'fzCookiesCookieTitle2' => 'Erweitert',
            'fzCookiesCookieDescription2' => 'Mit dieser Einstellung werden notwendige Cookies und Cookies für erweiterte Funktionen geladen und zugelassen.',
            'fzCookiesCookieTitle3' => 'Analyse',
            'fzCookiesCookieDescription3' => 'Mit dieser Einstellung werden Google Fonts, Cookies für erweiterte Funktionen, sowie Google Analytics geladen und zugelassen.'
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
