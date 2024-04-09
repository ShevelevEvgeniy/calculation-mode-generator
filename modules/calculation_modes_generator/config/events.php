<?php

use app\Enums\CalculationEvent;
use app\Observers\ObserverCombinationFound;
use app\Observers\ObserverCombinationNotFound;
use app\Observers\ObserverStepCompleted;
use app\Observers\ObserverStepNotCompleted;

return [
    [CalculationEvent::STEP_COMPLETED, new ObserverStepCompleted()],
    [CalculationEvent::STEP_NOT_COMPLETED, new ObserverStepNotCompleted()],
    [CalculationEvent::COMBINATION_NOT_FOUND, new ObserverCombinationNotFound()],
    [CalculationEvent::COMBINATION_FOUND, new ObserverCombinationFound()],
];