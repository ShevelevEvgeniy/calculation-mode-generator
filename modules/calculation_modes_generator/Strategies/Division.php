<?php

namespace app\Strategies;

use app\DTO\DTO;

class Division implements StrategyInterface
{
    /**
     * @param DTO $context
     * @return void
     */
    public function calculate(DTO $context): void
    {
        if ($context->total <= 1000) {
            throw new \LogicException('Текущий итого меньше или равно 1000');
        }

        $context->total = ceil($context->firstNumber / $context->secondNumber);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'деление';
    }
}
