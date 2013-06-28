<?php

/**
 * This file is part of the pantarei/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\Bundle\Oauth2Bundle\Tests;

/**
 * Test if autoload able to discover all required classes.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
class AutoloadTest extends \PHPUnit_Framework_TestCase
{
    public function testExceptionClassesExist()
    {
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\AccessDeniedException'));
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\InvalidClientException'));
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\InvalidGrantException'));
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\InvalidRequestException'));
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\InvalidScopeException'));
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\ServerErrorException'));
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\TemporarilyUnavailableException'));
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\UnauthorizedClientException'));
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\UnsupportedGrantTypeException'));
        $this->assertTrue(class_exists('Pantarei\Oauth2\Exception\UnsupportedResponseTypeException'));
    }
}
