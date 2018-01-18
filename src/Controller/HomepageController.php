<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\LocationRepository;
use Doctrine\ORM\PersistentCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomepageController
{
    /**
     * @Template
     * @param LocationRepository $locationRepository
     *
     * @return array
     */
    public function indexAction(LocationRepository $locationRepository)
    {
        $locations = $locationRepository->findAll();

        $pointSets = [];

        /** @var Location $location */
        foreach ($locations as $location) {
            /** @var PersistentCollection $points */
            $points = $location->getPoints();
            $pointSets[$location->getId()] = $points->toArray();
        }

        return ['point_sets' => $pointSets];
    }
}