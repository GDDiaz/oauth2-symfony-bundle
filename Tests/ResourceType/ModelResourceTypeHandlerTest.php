<?php

/**
 * This file is part of the authbucket/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\Bundle\OAuth2Bundle\Tests\ResourceType;

use AuthBucket\Bundle\OAuth2Bundle\Tests\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class ModelResourceTypeHandlerTest extends WebTestCase
{
    public function testExceptionNotExistsAccessToken()
    {
        $parameters = array();
        $server = array(
            'HTTP_Authorization' => implode(' ', array('Bearer', 'abcd')),
        );
        $client = $this->createClient();
        $crawler = $client->request('GET', '/resource/resource_type/model', $parameters, array(), $server);
        $resourceResponse = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('invalid_request', $resourceResponse['error']);
    }

    public function testExceptionExpiredAccessToken()
    {
        $parameters = array();
        $server = array(
            'HTTP_Authorization' => implode(' ', array('Bearer', 'd2b58c4c6bc0cc9fefca2d558f1221a5')),
        );
        $client = $this->createClient();
        $crawler = $client->request('GET', '/resource/resource_type/model', $parameters, array(), $server);
        $resourceResponse = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('invalid_request', $resourceResponse['error']);
    }
}
