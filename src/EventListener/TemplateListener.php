<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
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
            // $cookiebar = '<div style="display:none;">Hello World !</div>';
            $cookiebar = $generator->createTemplate($rootPage->row())->parse();

            if ('before_wrapper' === $rootPage->cookiebar_placement) {
                $buffer = str_replace('<div id="wrapper">', $cookiebar.'<div id="wrapper">', $buffer);
            } else {
                $buffer = str_replace('</body>', $cookiebar.'</body>', $buffer);
            }
        }

        return $buffer;
    }
}