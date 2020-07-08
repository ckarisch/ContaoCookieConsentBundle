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
use Contao\PageModel;

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
        $template->disableCookieLevel2 = $defaults['fzCookiesDisableCookieLevel2'] == 'hide';
        $template->disableCookieLevel3 = $defaults['fzCookiesDisableCookieLevel3'] == 'hide';

        // set max cookie value
        if($template->disableCookieLevel3) {
            $template->maxValue = 2;

            if($template->disableCookieLevel2) {
                $template->maxValue = 1;
            }
        }


        // imprint and privacy pages
        $imprintPage = \PageModel::findWithDetails($defaults['fzCookiesImprintPage']);
        $privacyPage = \PageModel::findWithDetails($defaults['fzCookiesPrivacyPage']);

        $imprintPageUrl = $imprintPage ? $imprintPage->getAbsoluteUrl() : $defaults["fzCookiesImprintPage"];
        $privacyPageUrl = $privacyPage ? $privacyPage->getAbsoluteUrl() : $defaults["fzCookiesPrivacyPage"];

        // text array
        $template->text = array(
            'heading'  => $defaults['fzCookiesHeading'],
            'fzCookiesImprintTitle'  => $defaults['fzCookiesImprintTitle'],
            'fzCookiesPrivacyTitle'  => $defaults['fzCookiesPrivacyTitle'],
            'fzCookiesCookieTitle1'  => $defaults['fzCookiesCookieTitle1'],
            'fzCookiesCookieTitle2'  => $defaults['fzCookiesCookieTitle2'],
            'fzCookiesCookieTitle3'  => $defaults['fzCookiesCookieTitle3'],
            'fzCookiesCookieDescription1'  => $defaults['fzCookiesCookieDescription1'],
            'fzCookiesCookieDescription2'  => $defaults['fzCookiesCookieDescription2'],
            'fzCookiesCookieDescription3'  => $defaults['fzCookiesCookieDescription3'],
        );

        // links array
        $template->links = array(
            'fzCookiesImprintPage' => $imprintPageUrl,
            'fzCookiesPrivacyPage' => $privacyPageUrl
        );

        return $template;
    }

    public function getDefaults() {
        $defaults = array(
            'fzCookiesHeading' => array('Wählen Sie Ihre Datenschutzeinstellungen', false),
            'fzCookiesImprintTitle' => array('Impressum', false),
            'fzCookiesImprintPage' => array('impressum.html', false),
            'fzCookiesPrivacyTitle' => array('Datenschutz', false),
            'fzCookiesPrivacyPage' => array('datenschutz.html', false),
            'fzCookiesCookieTitle1' => array('Notwendig', false),
            'fzCookiesCookieDescription1' => array('Mit dieser Einstellung wird zur korrekten Darstellung der Website Google Fonts geladen.', false),
            'fzCookiesCookieTitle2' => array('Erweitert', false),
            'fzCookiesCookieDescription2' => array('Mit dieser Einstellung werden notwendige Cookies und Cookies für erweiterte Funktionen geladen und zugelassen.', false),
            'fzCookiesCookieTitle3' => array('Analyse', false),
            'fzCookiesCookieDescription3' => array('Mit dieser Einstellung werden Google Fonts, Cookies für erweiterte Funktionen, sowie Google Analytics geladen und zugelassen.', false),
            'fzCookiesDisableCookieLevel2' => array('hide', true),
            'fzCookiesDisableCookieLevel3' => array('show', true),
            'fzCookiesEnableOnPrivacyPage' => array('hide', true),
            'fzCookiesEnableOnImprintPage' => array('show', true)
        );

        // save defaults to config
        foreach ($defaults as $key => $value)
        {
            if(empty(\Config::get($key)))
                \Config::persist($key, $value[0]);
            else {
                $defaults[$key][0] = \Config::get($key);
            }
        }

        $roots = PageModel::findByType('root');
		foreach ($roots as $page) {
            if($page->__get('language') == $GLOBALS['TL_LANGUAGE']) {
                foreach ($defaults as $key => $value)
                {
    	             if (!empty($page->__get($key))) {
                         // check if set to default
                         if($value[1] && $page->__get($key) == 'default') {
                             continue;
                         }
                         else {
                             $defaults[$key][0] = $page->__get($key);
                         }
                     }
                 }
             }
         }

        // only return first value of array
        $first = function($value) { return $value[0]; };
        return array_map($first, $defaults);
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
