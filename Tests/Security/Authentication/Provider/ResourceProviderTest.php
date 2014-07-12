<?php

/**
 * This file is part of the authbucket/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\Bundle\OAuth2Bundle\Tests\Security\Authentication\Provider;

use AuthBucket\Bundle\OAuth2Bundle\Tests\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class ResourceProviderTest extends WebTestCase
{
    public function testNonCompatibileScope()
    {
        $parameters = array(
            'debug_token' => 'bcc105b66698a64ed23c87b967885289',
        );
        $server = array(
            'HTTP_Authorization' => implode(' ', array('Bearer', 'bcc105b66698a64ed23c87b967885289')),
        );
        $client = $this->createClient();
        $crawler = $client->request('GET', '/resource/debug/model', $parameters, array(), $server);
        $resourceResponse = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('invalid_scope', $resourceResponse['error']);
    }

    public function testEnoughScope()
    {
        $parameters = array(
            'debug_token' => 'eeb5aa92bbb4b56373b9e0d00bc02d93',
        );
        $server = array(
            'HTTP_Authorization' => implode(' ', array('Bearer', 'eeb5aa92bbb4b56373b9e0d00bc02d93')),
        );
        $client = $this->createClient();
        $crawler = $client->request('GET', '/resource/debug/model', $parameters, array(), $server);
        $resourceResponse = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('demousername1', $resourceResponse['username']);
    }

    public function testMoreScope()
    {
        $parameters = array(
            'debug_token' => 'ba2e8d1f54ed3e3d96935796576f1a06',
        );
        $server = array(
            'HTTP_Authorization' => implode(' ', array('Bearer', 'ba2e8d1f54ed3e3d96935796576f1a06')),
        );
        $client = $this->createClient();
        $crawler = $client->request('GET', '/resource/debug/model', $parameters, array(), $server);
        $resourceResponse = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('demousername1', $resourceResponse['username']);
    }
}
