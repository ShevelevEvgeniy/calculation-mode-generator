<?php

namespace app\Console;

use Craft\Contracts\CommandInterface;
use Craft\Contracts\InputInterface;
use Craft\Contracts\OutputInterface;

use app\Repositories\StorageCalculationLogRepository;
use app\Console\Render\RenderAnsi;
use app\Handler\HandlerInterface;
use app\DTO\DTO;

class CalculatorCommand implements CommandInterface
{
    /**
     * @var string
     */
    private static string $commandName = 'calculator:calculate-modes {firstNumber} {?secondNumber=300} --save-file';

    /**
     * @var string
     */
    public static string $description = 'Команда подбора последовательности режимов расчета для случайных чисел';

    /**
     * @param HandlerInterface $handler
     * @param StorageCalculationLogRepository $repository
     */
    public function __construct(
        private readonly HandlerInterface $handler,
        private readonly StorageCalculationLogRepository $repository
    ) { }

    /**
     * @return string
     */
    public static function getCommandName(): string
    {
        return self::$commandName;
    }

    /**
     * @return string
     */
    public static function getDescription(): string
    {
        return self::$description;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $params = $input->getArguments();

        $context = new DTO(...$params);

        $this->handler->handle($context);

        $this->repository->save($context);

        $render = new RenderAnsi();

        $response = $render->render($context);

        $output->setMessage($response);
    }
}
