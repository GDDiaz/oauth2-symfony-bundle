<?php

/**
 * This file is part of the authbucket/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\Bundle\OAuth2Bundle\Tests\GrantType;

use AuthBucket\OAuth2\GrantType\GrantTypeHandlerFactory;

class GrantTypeHandlerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \AuthBucket\OAuth2\Exception\UnsupportedGrantTypeException
     */
    public function testNonExistsGrantTypeHandler()
    {
        $grantTypeHandlerFactory = new GrantTypeHandlerFactory(array(
            'foo' => 'AuthBucket\\Bundle\\OAuth2Bundle\\Tests\\GrantType\\NonExistsGrantTypeHandler',
        ));
        $grantTypeHandlerFactory->addGrantTypeHandler('foo', $grantTypeHandler);
    }

    /**
     * @expectedException \AuthBucket\OAuth2\Exception\UnsupportedGrantTypeException
     */
    public function testBadAddGrantTypeHandler()
    {
        $grantTypeHandlerFactory = new GrantTypeHandlerFactory(array(
            'foo' => 'AuthBucket\\Bundle\\OAuth2Bundle\\Tests\\GrantType\\FooGrantTypeHandler',
        ));
        $grantTypeHandlerFactory->addGrantTypeHandler('foo', $grantTypeHandler);
    }

    /**
     * @expectedException \AuthBucket\OAuth2\Exception\UnsupportedGrantTypeException
     */
    public function testBadGetGrantTypeHandler()
    {
        $grantTypeHandlerFactory = new GrantTypeHandlerFactory(array(
            'bar' => 'AuthBucket\\Bundle\\OAuth2Bundle\\Tests\\GrantType\\BarGrantTypeHandler',
        ));
        $grantTypeHandlerFactory->getGrantTypeHandler('foo');
    }

    public function testGoodGetGrantTypeHandler()
    {
        $grantTypeHandlerFactory = new GrantTypeHandlerFactory(array(
            'bar' => 'AuthBucket\\Bundle\\OAuth2Bundle\\Tests\\GrantType\\BarGrantTypeHandler',
        ));
        $grantTypeHandlerFactory->getGrantTypeHandler('bar');
    }
}
