<?php

namespace App\DataFixtures;

use App\Entity\Step;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $newStep = new Step();
        $newStep->setName('Facebook');
        $manager->persist($newStep);
        $this->addReference('facebook', $newStep);

        $newStep = new Step();
        $newStep->setName('Instagram');
        $manager->persist($newStep);
        $this->addReference('Instagram', $newStep);

        $manager->flush();
    }
}
