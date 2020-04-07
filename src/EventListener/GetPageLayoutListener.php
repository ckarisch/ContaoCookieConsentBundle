<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 * @license LGPL-3.0-or-later
 */

namespace Formundzeichen\ContaoCookieConsentBundle\EventListener;

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

        if(!$GLOBALS['TL_CONFIG']['fzCookiesEnableOnImprintPage'])
        {
            $imprintPage = \PageModel::findWithDetails($GLOBALS['TL_CONFIG']['fzCookiesImprintPage']);
            if($imprintPage->id == $pageModel->id)
            {
                $pageModel->cssClass = trim($pageModel->cssClass . ' ' . $hideClass);
                return;
            }
        }

        if(!$GLOBALS['TL_CONFIG']['fzCookiesEnableOnPrivacyPage'])
        {
            $privacyPage = \PageModel::findWithDetails($GLOBALS['TL_CONFIG']['fzCookiesPrivacyPage']);
            if($privacyPage->id == $pageModel->id)
            {
                $pageModel->cssClass = trim($pageModel->cssClass . ' ' . $hideClass);
                return;
            }
        }
    }
}