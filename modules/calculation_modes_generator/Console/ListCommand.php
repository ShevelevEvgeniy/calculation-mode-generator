<?php

namespace app\Console;

use Craft\Contracts\ConsoleKernelInterface;
use Craft\Contracts\CommandInterface;
use Craft\Contracts\InputInterface;
use Craft\Contracts\OutputInterface;

class ListCommand implements CommandInterface
{
    /**
     * @var string
     */
    private static string $commandName = 'list';

    public static string $description = 'Выводит список всех доступных команд и опций';

    /**
     * @param ConsoleKernelInterface $kernel
     */
    public function __construct(
        private readonly ConsoleKernelInterface $kernel
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

    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $output->primary("\nКомпонентный фреймворк"  . PHP_EOL  . PHP_EOL);
        $output->warning('Фреймворк создан разработчиками компании ЭФКО Цифровые решения.
Является платформой для изучения базового поведения приложения созданного на PHP.
Фреймворк не является production-ready реализацией и не предназначен для коммерческого использования'. "\n\n"
        );
        $output->success("Доступные опции:" . PHP_EOL);

        $formattedOptions = [];

        foreach ($this->kernel->getPlugins() as $plugin) {
            $formattedOptions[] = "\t\033[32m {$plugin::getPluginName()} \033[0m - {$plugin::getDescription()}"  . PHP_EOL;
        }

        $output->stdout(implode("", $formattedOptions));
        $output->success("\t Вызов: ");
        $output->stdout("команда [аргументы] [опции]"  . PHP_EOL . PHP_EOL);
        $output->stdout("Доступные команды:" . PHP_EOL);

        $formattedCommands = [];

        foreach ($this->kernel->getCommandMap() as $name => $command) {
            $formattedCommands[] = "\t\033[32m $name \033[0m - {$command::getDescription()}\n";
        }

        $output->stdout(implode("", $formattedCommands) . PHP_EOL);
        $output->setMessage('');
        $output->setStatusCode(0);
    }
}
