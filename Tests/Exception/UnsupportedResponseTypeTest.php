<?php

/**
 * This file is part of the pantarei/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\Bundle\OAuth2Bundle\Tests\Exception;

use Pantarei\OAuth2\Exception\UnsupportedResponseTypeException;

/**
 * Test unsupported response type exception.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
class UnsupportedResponseTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Pantarei\OAuth2\Exception\UnsupportedResponseTypeException
     */
    public function testUnsupportedResponseTypeException()
    {
        throw new UnsupportedResponseTypeException();
    }
}
