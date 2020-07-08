<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 */

namespace Formundzeichen\ContaoCookieConsentBundle\EventListener;
use Formundzeichen\ContaoCookieConsentBundle\ContaoCookieConsentBundle;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\PageRegular;
use Contao\LayoutModel;
use Contao\PageModel;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

class GetPageLayoutListener implements ServiceAnnotationInterface
{
    /**
     * @Hook("getPageLayout")
     */
    public function onGetPageLayout(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    {
        $hideClass = 'hide_cookie_consent';
        $bundle = new ContaoCookieConsentBundle();
        $defaults = $bundle->getDefaults();

        if($defaults['fzCookiesEnableOnImprintPage'] == 'hide')
        {
            $imprintPage = \PageModel::findWithDetails($defaults['fzCookiesImprintPage']);
            if($imprintPage->id == $pageModel->id)
            {
                $pageModel->cssClass = trim($pageModel->cssClass . ' ' . $hideClass);
                return;
            }
        }

        if($defaults['fzCookiesEnableOnPrivacyPage'] == 'hide')
        {
            $privacyPage = \PageModel::findWithDetails($defaults['fzCookiesPrivacyPage']);
            if($privacyPage->id == $pageModel->id)
            {
                $pageModel->cssClass = trim($pageModel->cssClass . ' ' . $hideClass);
                return;
            }
        }
    }
}