<?php

namespace app\Strategies;

use app\DTO\DTO;

class Addition implements StrategyInterface
{
    /**
     * @param DTO $context
     * @return void
     */
    public function calculate(DTO $context): void
    {
        if ($context->total < 0) {
            throw new \LogicException('Текущий итого меньше ноля');
        }
        $context->total = $context->firstNumber + $context->secondNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'сложение';
    }
}
