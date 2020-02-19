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
    public function createTemplate(array $data, $name = 'mod_cookieconsent')
    {
        $template = new FrontendTemplate($name);

        // Cookie name
        $template->cookie = sprintf('FZ_COOKIECONSENT_%s', $data['id']);

        return $template;
    }
}
