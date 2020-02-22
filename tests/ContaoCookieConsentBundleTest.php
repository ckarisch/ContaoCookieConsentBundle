<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Formundzeichen\ContaoCookieConsentBundle\Tests;

use Formundzeichen\ContaoCookieConsentBundle\ContaoCookieConsentBundle;
use PHPUnit\Framework\TestCase;

class ContaoCookieConsentBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoCookieConsentBundle();

        $this->assertInstanceOf('Formundzeichen\ContaoCookieConsentBundle\ContaoCookieConsentBundle', $bundle);
    }
}
