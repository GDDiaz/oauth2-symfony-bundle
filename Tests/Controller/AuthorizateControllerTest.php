<?php

/**
 * This file is part of the pantarei/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\Bundle\OAuth2Bundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthorizateControllerTest extends WebTestCase
{
    public function testExceptionNoResponseType()
    {
        $parameters = array(
            'client_id' => '1234',
        );
        $server = array(
            'PHP_AUTH_USER' => 'demousername1',
            'PHP_AUTH_PW' => 'demopassword1',
        );
        $client = static::createClient();
        $crawler = $client->request('GET', '/authorize', $parameters, array(), $server);
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertNotNull(json_decode($client->getResponse()->getContent()));
        $token_response = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('invalid_request', $token_response['error']);
    }

    public function testErrorBadResponseType()
    {
        $parameters = array(
            'response_type' => 'foo',
            'client_id' => '1234',
            'redirect_uri' => 'http://example.com/redirect_uri',
        );
        $server = array(
            'PHP_AUTH_USER' => 'demousername1',
            'PHP_AUTH_PW' => 'demopassword1',
        );
        $client = static::createClient();
        $crawler = $client->request('GET', '/authorize', $parameters, array(), $server);
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertNotNull(json_decode($client->getResponse()->getContent()));
        $token_response = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('unsupported_response_type', $token_response['error']);
    }
}
