<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Formundzeichen\ContaoCookieConsentBundle\Tests;

use Fz\ContaoCookieConsentBundle\ContaoCookieConsentBundle;
use PHPUnit\Framework\TestCase;

class ContaoCookieConsentBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoCookieConsentBundle();

        $this->assertInstanceOf('Fz\ContaoCookieConsentBundle\ContaoCookieConsentBundle', $bundle);
    }
}
