<?php

namespace app\Http\Render;

use app\DTO\DTO;

header('Content-type: text/html; charset=UTF-8');

class RenderHTML
{
    /**
     * @param DTO $context
     * @return string
     */
    public static function render(DTO $context): string
    {
        if ($context->goodCombination) {
            $result = 'Найдена удачная комбинация' .
                '<br>Число 1 - ' . $context->firstNumber . '<br>Число 2 - ' . $context->secondNumber;

            $result .= '<br>Последовательность действий:<br>' .
                implode(' ', $context->goodCombination) . '<br>Выполнено итераций ' . $context->countAttempts;

            $result .= '<br>Лог выполнения:<br>Текущий результат 0';

            $logCount = count($context->log);

            for ($i = 0; $i < $logCount; $i++) {
                $result .= '<br>Выполнено действие: ' . $context->goodCombination[$i] .
                    '. Результат ' . $context->log[$i];

                if ($i < $logCount - 1) {
                    $result .= '<br>Текущий результат ' . $context->log[$i];
                }
            }

            $result .= '<br>Неудачные комбинации:';

            foreach ($context->combination as $combination) {
                $result .= '<br>' . implode(' ', $combination);
            }
        }

        if (empty($context->goodCombination)) {
            $result = 'Удачной комбинации не найдено' .
                '<br>Число 1 - ' . $context->firstNumber . '<br>Число 2 - ' . $context->secondNumber;
        }

        /** @var $result */
        return $result;
    }
}
