<?php

/**
 * This file is part of the pantarei/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\Bundle\OAuth2Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Pantarei\OAuth2\Model\RefreshTokenInterface;

/**
 * RefreshToken
 *
 * @ORM\MappedSuperclass(repositoryClass="Pantarei\Bundle\OAuth2Bundle\Entity\RefreshTokenRepository")
 */
class RefreshToken implements RefreshTokenInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="refresh_token", type="string", length=255)
     */
    protected $refresh_token;

    /**
     * @var string
     *
     * @ORM\Column(name="client_id", type="string", length=255)
     */
    protected $client_id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    protected $username;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires", type="datetime")
     */
    protected $expires;

    /**
     * @var array
     *
     * @ORM\Column(name="scope", type="array")
     */
    protected $scope;

    public function __construct(
        $refresh_token,
        $client_id,
        $username,
        $expires,
        $scope = array()
    )
    {
        $this->refresh_token = $refresh_token;
        $this->client_id = $client_id;
        $this->username = $username;
        $this->expires = $expires;
        $this->scope = $scope;
    }

    /**
     * Get refresh_token
     *
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
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
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get expires
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Get scope
     *
     * @return array
     */
    public function getScope()
    {
        return $this->scope;
    }
}
