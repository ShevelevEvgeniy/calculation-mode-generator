<?php

namespace app\Console\Render;

use app\DTO\DTO;

class RenderAnsi
{
    /**
     * @param DTO $context
     * @return string
     */
    public static function render(DTO $context): string
    {
        if ($context->goodCombination) {
            $result = "\033[92mНайдена удачная комбинация:\033[0m" . PHP_EOL .
                "Число 1 - " . $context->firstNumber . PHP_EOL . "Число 2 - " . $context->secondNumber . PHP_EOL;

            $result .= "\033[92mПоследовательность действий:\033[0m". PHP_EOL .
                "\033[93m" . implode(" ", $context->goodCombination) . "\033[0m" . PHP_EOL;

            $result .= "\033[94mВыполнено итераций " . $context->countAttempts . "\033[0m" . PHP_EOL;

            $result .= "Лог выполнения:" . PHP_EOL;

            $logCount = count($context->log);

            $result .= "Текущий результат 0" . PHP_EOL;

            for ($i = 0; $i < $logCount; $i++) {
                $result .= "Выполнено действие: " . $context->goodCombination[$i] .
                    ". Результат " . $context->log[$i] . PHP_EOL;

                if ($i < $logCount - 1) {
                    $result .= "Текущий результат " . $context->log[$i] . PHP_EOL;
                }
            }
            $result .= "\033[31mНеудачные комбинации:\033[0m" . PHP_EOL;

            foreach ($context->combination as $combination) {
                $result .= "\033[91m" . implode(' ', $combination) . "\033[0m" . PHP_EOL;
            }
        }

        if (empty($context->goodCombination)) {
            $result = "\033[31mУдачной комбинации не найдено\033[0m" . PHP_EOL .
            "Число 1 - " . $context->firstNumber . PHP_EOL . "Число 2 - " . $context->secondNumber . PHP_EOL;
        }

        /** @var $result */
        return $result;
    }
}
