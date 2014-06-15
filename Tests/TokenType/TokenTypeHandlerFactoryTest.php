<?php

/**
 * This file is part of the authbucket/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\Bundle\OAuth2Bundle\Tests\TokenType;

use AuthBucket\OAuth2\Model\ModelManagerFactoryInterface;
use AuthBucket\OAuth2\TokenType\TokenTypeHandlerFactory;
use AuthBucket\OAuth2\TokenType\TokenTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Request;

class FooTokenTypeHandler
{
}

class BarTokenTypeHandler implements TokenTypeHandlerInterface
{
    public function getAccessToken(Request $request)
    {
    }


    public function createAccessToken(
        ModelManagerFactoryInterface $modelManagerFactory,
        $client_id,
        $username = '',
        $scope = array(),
        $state = null,
        $withRefreshToken = true
    )
    {
    }
}

class TokenTypeHandlerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \AuthBucket\OAuth2\Exception\ServerErrorException
     */
    public function testBadAddTokenTypeHandler()
    {
        $tokenTypeHandlerFactory = new TokenTypeHandlerFactory(array(
            'foo' => 'AuthBucket\\Bundle\\OAuth2Bundle\\Tests\\TokenType\\FooTokenTypeHandler',
        ));
        $tokenTypeHandlerFactory->addTokenTypeHandler('foo', $tokenTypeHandler);
    }

    /**
     * @expectedException \AuthBucket\OAuth2\Exception\ServerErrorException
     */
    public function testEmptyGetTokenTypeHandler()
    {
        $tokenTypeHandlerFactory = new TokenTypeHandlerFactory();
        $tokenTypeHandlerFactory->getTokenTypeHandler();
    }

    /**
     * @expectedException \AuthBucket\OAuth2\Exception\ServerErrorException
     */
    public function testBadGetTokenTypeHandler()
    {
        $tokenTypeHandlerFactory = new TokenTypeHandlerFactory(array(
            'bar' => 'AuthBucket\\Bundle\\OAuth2Bundle\\Tests\\TokenType\\BarTokenTypeHandler',
        ));
        $tokenTypeHandlerFactory->getTokenTypeHandler('foo');
    }

    public function testGoodGetTokenTypeHandler()
    {
        $tokenTypeHandlerFactory = new TokenTypeHandlerFactory(array(
            'bar' => 'AuthBucket\\Bundle\\OAuth2Bundle\\Tests\\TokenType\\BarTokenTypeHandler',
        ));
        $tokenTypeHandlerFactory->getTokenTypeHandler('bar');
    }
}
