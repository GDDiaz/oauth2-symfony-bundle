<?php

/**
 * This file is part of the authbucket/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\Bundle\OAuth2Bundle\Tests\TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AuthBucket\Bundle\OAuth2Bundle\Tests\TestBundle\Entity\RefreshToken;

class RefreshTokenFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $model = new RefreshToken();
        $model->setRefreshToken('288b5ea8e75d2b24368a79ed5ed9593b')
            ->setClientId('http://democlient3.com/')
            ->setUsername('demousername3')
            ->setExpires(new \DateTime('+1 days'))
            ->setScope(array(
                'demoscope1',
                'demoscope2',
                'demoscope3',
            ));
        $manager->persist($model);
        $model = new RefreshToken();
        $model->setRefreshToken('5ff43cbc27b54202c6fd8bb9c2a308ce')
            ->setClientId('http://democlient1.com/')
            ->setUsername('demousername1')
            ->setExpires(new \DateTime('-1 days'))
            ->setScope(array(
                'demoscope1',
            ));
        $manager->persist($model);

        $manager->flush();
    }
}
