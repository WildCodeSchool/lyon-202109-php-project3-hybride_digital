<?php

namespace App\DataFixtures;

use App\Entity\Roadmap;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoadmapFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $newRoadmap = new Roadmap();
        $newRoadmap->setName('Reseaux Sociaux');

        $manager->persist($newRoadmap);
        $this->addReference('roadmap', $newRoadmap);

        $manager->flush();
    }
}
