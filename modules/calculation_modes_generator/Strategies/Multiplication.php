<?php

namespace app\Strategies;

use app\DTO\DTO;

class Multiplication implements StrategyInterface
{
    /**
     * @param DTO $context
     * @return void
     */
    public function calculate(DTO $context): void
    {
        if ($context->total <= 10) {
            throw new \LogicException('Текущий итого меньше или равно 10');
        }

        $context->total = $context->firstNumber * $context->secondNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'умножение';
    }
}
