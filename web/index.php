<?php

use Craft\Components\DIContainer\DIContainer;
use Craft\Components\ErrorHandler\WebErrorHandler;
use Craft\Contracts\DataBaseConnectionInterface;
use Craft\Contracts\EventDispatcherInterface;
use Craft\Contracts\HttpKernelInterface;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);

const PROJECT_ROOT = __DIR__ . '/../';

require_once PROJECT_ROOT . 'vendor/autoload.php';

$errorHandler = new WebErrorHandler(
    WebErrorHandler::LOG_LEVEL_ERROR,
    PROJECT_ROOT . 'runtime/WebErrors/error.log'
);

set_error_handler([$errorHandler, 'handle']);
set_exception_handler([$errorHandler, 'handleException']);

$container = DIContainer::createContainer(require_once PROJECT_ROOT . 'modules/calculation_modes_generator/config/di-container.php');

$container->singleton(EventDispatcherInterface::class);
$container->singleton(DataBaseConnectionInterface::class);

require_once PROJECT_ROOT . 'modules/calculation_modes_generator/routes/web.php';

$kernel = $container->make(HttpKernelInterface::class);

$response = $container->call($kernel, 'handle');

$response->send();
