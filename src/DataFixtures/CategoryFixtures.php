<?php
namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $valuables = new Category();
        $valuables->setTitle('valuables');
        $manager->persist($valuables);
        $this->addReference('category-valuables', $valuables);

        $clothing = new Category();
        $clothing->setTitle('clothing');
        $this->addReference('category-clothing', $clothing);

        $keys = new Category();
        $keys->setTitle('keys');
        $this->addReference('category-keys', $keys);

        $manager->persist($valuables);
        $manager->persist($clothing);
        $manager->persist($keys);




        $manager->flush();
    }

}