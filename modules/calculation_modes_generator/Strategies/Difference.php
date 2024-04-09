<?php

namespace app\Strategies;

use app\DTO\DTO;

class Difference implements StrategyInterface
{
    /**
     * @param DTO $context
     * @return void
     */
    public function calculate(DTO $context): void
    {
        if ($context->total >= 1000) {
            throw new \LogicException('Текущий итого больше или равно 1000');
        }

        $context->total = $context->firstNumber - $context->secondNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'вычитание';
    }
}
