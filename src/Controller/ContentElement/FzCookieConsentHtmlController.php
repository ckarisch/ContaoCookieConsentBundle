<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 */

namespace Formundzeichen\ContaoCookieConsentBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FzCookieConsentHtmlController extends AbstractContentElementController
{
    public function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
        $licenseLevel = \Config::get('fzCookiesLicenseLevel');

        // checkLicense
        if($licenseLevel >=2 ) {
            $template->licenseActive = true;
            $template->html = $model->html;
            $template->cookieLevel = $model->fz_cookie_consent_cookie_level;


            switch ($model->fz_cookie_consent_cookie_level) {
                case 1:
                    $template->cookieName = \Config::get('fzCookiesCookieTitle1');
                    break;
                case 2:
                    $template->cookieName = \Config::get('fzCookiesCookieTitle2');
                    break;
                case 3:
                    $template->cookieName = \Config::get('fzCookiesCookieTitle3');
                    break;
                default:
                    $template->cookieName = \Config::get('fzCookiesCookieTitle3');
            }

            return $template->getResponse();
        }
        else {
            return null;
        }
    }
}