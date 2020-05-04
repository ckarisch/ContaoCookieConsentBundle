<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 */

namespace Formundzeichen\ContaoCookieConsentBundle\EventListener;
use Formundzeichen\ContaoCookieConsentBundle\ContaoCookieConsentBundle;

use Contao\PageModel;

class TemplateListener
{
    /**
     * On output the frontend template.
     *
     * @param string $buffer
     *
     * @return string
     */
    public function onOutputFrontendTemplate($buffer)
    {
        if (null !== ($rootPage = PageModel::findByPk($GLOBALS['objPage']->rootId)) ) { //}&& $rootPage->cookiebar_enable) {
            $generator = new ContaoCookieConsentBundle();
            $templateName = $GLOBALS['TL_CONFIG']['fzCookiesTemplateName'] ? $GLOBALS['TL_CONFIG']['fzCookiesTemplateName'] : 'mod_cookieconsent1';
            $cookiebar = $generator->createTemplate($rootPage->row(), $templateName)->parse();
            $buffer = str_replace('</body>', $cookiebar.'</body>', $buffer);
        }

        return $buffer;
    }
}