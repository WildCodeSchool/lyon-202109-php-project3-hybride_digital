<?php

namespace App\DataFixtures;

use App\Entity\Action;
use App\DataFixtures\RessourceFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActionFixtures extends Fixture implements DependentFixtureInterface
{
    public const ACTION = [
        ['Création compte facebook', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
         sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
          Excepteur sint occaecat cupidatat non proident,
           sunt in culpa qui officia deserunt mollit anim id est.', [0]],
        ['Modification compte facebook', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
         Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident,
           sunt in culpa qui officia deserunt mollit anim id est labo', [1]],
        ['Création compte instagram', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
        incididunt ut labore et dolore magna aliqua.
         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
          Excepteur sint occaecat cupidatat non proident,
           sunt in culpa qui officia deserunt mollit anim id est labo.', [2]],
        ['Modification compte instagram', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod t
        incididunt ut labore et dolore magna aliqua.
         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
          Excepteur sint occaecat cupidatat non proident,
           sunt in culpa qui officia deserunt mollit anim id est l.', [3]],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ACTION as $key => $actionTab) {
            $action = new Action();

            $action->setName($actionTab[0]);
            $action->setText($actionTab[1]);


            foreach ($actionTab[2] as $ressourceId) {
                $action->addRessource($this->getReference('ressource_' . $ressourceId));
            }

            $manager->persist($action);
            $this->addReference('action_' . ($key), $action);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RessourceFixtures::class,
        ];
    }
}
