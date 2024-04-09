<?php

namespace app\Enums;

class CalculationEvent
{
    /**
     * @param string $message
     */
    const STEP_COMPLETED = 'step_completed';

    /**
     * @param string $message
     */
    const STEP_NOT_COMPLETED = 'step_not_completed';

    /**
     * @param string $message
     */
    const COMBINATION_NOT_FOUND = 'combination_not_found';

    /**
     * @param string $message
     */
    const COMBINATION_FOUND = 'combination_found';
}
