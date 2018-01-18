<?php
namespace App\DataFixtures;

use App\Entity\Point;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PointFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $point1 = new Point();
        $point1->setLatitude(45.809771);
        $point1->setLongitude(15.931451);

        $point2 = new Point();
        $point2->setLatitude(45.808492);
        $point2->setLongitude(15.970450);

        $point3 = new Point();
        $point3->setLatitude( 45.813008);
        $point3->setLongitude(15.944256);

        $point4 = new Point();
        $point4->setLatitude(45.819583);
        $point4->setLongitude(16.016235);

        $manager->persist($point1);
        $manager->persist($point2);
        $manager->persist($point3);
        $manager->persist($point4);

        $this->addReference('1-point', $point1);
        $this->addReference('2-point', $point2);
        $this->addReference('3-point', $point3);
        $this->addReference('4-point', $point4);

        $manager->flush();
    }
}