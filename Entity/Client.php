<?php

/**
 * This file is part of the pantarei/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\Bundle\Oauth2Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Pantarei\Oauth2\Model\ClientInterface;

/**
 * Client
 */
class Client implements ClientInterface
{
    /**
     * @var string
     */
    protected $client_id;

    /**
     * @var string
     */
    protected $client_secret;

    /**
     * @var string
     */
    protected $redirect_uri;

    /**
     * Set client_id
     *
     * @param string $client_id
     * @return Client
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * Get client_id
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Set client_secret
     *
     * @param string $client_secret
     * @return Client
     */
    public function setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;

        return $this;
    }

    /**
     * Get client_secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * Set redirect_uri
     *
     * @param string $redirect_uri
     * @return Client
     */
    public function setRedirectUri($redirect_uri)
    {
        $this->redirect_uri = $redirect_uri;

        return $this;
    }

    /**
     * Get redirect_uri
     *
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }

    public function __construct()
    {
        $this->redirect_uri = '';
    }
}
