<?php

namespace app\Strategies;

use app\DTO\DTO;

interface StrategyInterface
{
    /**
     * @param DTO $context
     * @return void
     */
    public function calculate(DTO $context): void;

    /**
     * @return string
     */
    public function getName(): string;
}
