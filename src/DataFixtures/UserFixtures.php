<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail('admin@nulltraining.org');
        $admin->setUsername('admin');
        $admin->setEnabled(true);
        $admin->setPlainPassword('12345678');
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $visitor = new User();
        $visitor->setEmail('visitor@nulltraining.org');
        $visitor->setUsername('visitor');
        $visitor->setEnabled(true);
        $visitor->setPlainPassword('12345678');
        $manager->persist($visitor);

        $this->addReference('admin-user', $admin);
        $this->addReference('visitor-user', $visitor);

        $manager->flush();
    }
}
