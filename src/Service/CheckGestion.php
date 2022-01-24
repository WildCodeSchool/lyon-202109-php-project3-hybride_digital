<?php

namespace App\Service;

use App\Entity\Action;
use App\Entity\User;

class CheckGestion
{
    public function checkAction(
        Action $action,
        User $user
    ): void {
        //il faut identifier le step et vérifier si tous les check des checkAction
        //sont à true et si oui alors le stepcheck passe à true
        // $this->topCheck = false;
        // $actionChecks = $action->getActionChecks();
        // foreach ($actionChecks as $actionCheck) {
        //     if ($actionCheck->getIsComplete()) {
        //         $this->topCheck = true;
        //     }
        // }

        // $stepCheck = (object) $actionCheck->getStepCheck();
        // if ($this->topCheck === true) {
        //     $stepCheck->setIsComplete(true);
        // }

        //a partir du user je recupere la roadmapCheck pour récuperer le stepCheck
        //puis il faut balayer les actionsCheck
        // $raodmapCheck = (object) $user->getRoadmapChecks();
        // $stepCheck = $raodmapCheck->getStepChecks();
    }

    public function isAllActionCheck(): bool
    {
        return true;
    }
}
