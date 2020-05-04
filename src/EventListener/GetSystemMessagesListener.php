<?php

/*
 * Cookie Consent Plugin for Contao Open Source CMS
 *
 * (c) Christof Karisch
 *
 */

namespace Formundzeichen\ContaoCookieConsentBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

use Contao\Config;
use Contao\PageModel;
use Exception;

use Formundzeichen\ContaoCookieConsentBundle\ContaoBackendMessages;

class GetSystemMessagesListener
{
    /**
     * @Hook("outputBackendTemplate")
     */
  	public function onGetSystemMessages() {
        $contaoBackendMessages = new ContaoBackendMessages();
    		return $contaoBackendMessages->getContaoBackendMessages();
    }
}