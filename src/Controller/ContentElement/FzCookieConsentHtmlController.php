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
            return $template->getResponse();
        }
        else {
            return null;
        }
    }
}