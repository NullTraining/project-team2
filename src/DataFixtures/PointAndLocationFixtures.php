<?php
namespace App\DataFixtures;

use App\Entity\Location;
use App\Entity\Point;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PointAndLocationFixtures extends Fixture
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

        $location1 = new Location();
        $location1->setStreet('Palmotićeva');
        $location1->setStreetNumber('20a');
        $location1->setPostBox('10000');
        $location1->setCity('Zagreb');
        $location1->setPoints([$point1]);
        $point1->setLocation($location1);

        $location2 = new Location();
        $location2->setStreet('Zagrebački trokut');
        $location2->setStreetNumber('123');
        $location2->setPostBox('10000');
        $location2->setCity('Zagreb');
        $location2->setPoints([$point2, $point3, $point4]);
        $point2->setLocation($location2);
        $point3->setLocation($location2);
        $point4->setLocation($location2);

        $manager->persist($point1);
        $manager->persist($point2);
        $manager->persist($point3);
        $manager->persist($point4);
        $manager->persist($location1);
        $manager->persist($location2);

        $this->addReference('1-point', $point1);
        $this->addReference('2-point', $point2);
        $this->addReference('3-point', $point3);
        $this->addReference('4-point', $point4);
        $this->addReference('location-1', $location1);
        $this->addReference('location-2', $location2);

        $manager->flush();
    }
}