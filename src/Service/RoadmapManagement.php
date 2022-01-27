<?php

namespace App\Service;

use App\Entity\ActionCheck;
use App\Entity\Roadmap;
use App\Entity\RoadmapCheck;
use App\Entity\StepCheck;
use App\Entity\User;
use App\Repository\RoadmapRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class RoadmapManagement
{
    private EntityManagerinterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    public function newRoadmap(Roadmap $roadmap, User $user): void
    {
        $steps = $roadmap->getSteps();

        $roadmapCheck = new RoadmapCheck();
        $roadmapCheck->setRoadmap($roadmap)
            ->setUser($user)
            ->setIsComplete(false);
        $this->entityManager->persist($roadmapCheck);

        foreach ($steps as $step) {
            $actions = $step->getActions();

            $stepCheck = new StepCheck();
            $stepCheck->setRoadmapCheck($roadmapCheck)
                ->setStep($step)
                ->setIsComplete(false);
            $this->entityManager->persist($stepCheck);

            foreach ($actions as $action) {
                $actionCheck = new ActionCheck();
                $actionCheck->setAction($action)
                    ->setStepCheck($stepCheck)
                    ->setIsComplete(false);
                $this->entityManager->persist($actionCheck);
            }
        }
        $this->entityManager->flush();
    }
}
