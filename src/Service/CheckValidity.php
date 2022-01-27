<?php

namespace App\Service;

use App\Entity\ActionCheck;
use App\Entity\RoadmapCheck;
use App\Entity\StepCheck;

class CheckValidity
{
    public function ofAction(?ActionCheck $actionCheck): bool
    {
        return !is_null($actionCheck);
    }

    public function ofStep(?StepCheck $stepCheck): bool
    {
        return !is_null($stepCheck);
    }

    public function ofRoadmap(?RoadmapCheck $roadmapCheck): bool
    {
        return !is_null($roadmapCheck);
    }
}
