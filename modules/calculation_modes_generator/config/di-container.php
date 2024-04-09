<?php

use Craft\Contracts\MiddlewareInterface;
use Craft\Contracts\ConsoleKernelInterface;
use Craft\Contracts\DataBaseConnectionInterface;
use Craft\Contracts\EventDispatcherInterface;
use Craft\Contracts\HttpKernelInterface;
use Craft\Contracts\InputInterface;
use Craft\Contracts\OutputInterface;
use Craft\Contracts\RequestInterface;
use Craft\Contracts\ResponseInterface;
use Craft\Contracts\RouterInterface;
use Craft\Contracts\RoutesCollectionInterface;
use Craft\Contracts\StreamInterface;

use Craft\Components\DatabaseConnection\ConnectionFactory;
use Craft\Components\DIContainer\DIContainer;
use Craft\Components\EventDispatcher\EventDispatcher;

use Craft\Console\ConsoleKernel;
use Craft\Console\Input;
use Craft\Console\OptionsConfirm;
use Craft\Console\Output;

use Craft\Http\Factory\RequestFactory;
use Craft\Http\HttpKernel;
use Craft\Http\Message\Response;
use Craft\Http\Message\Stream;
use Craft\Http\Route\Router;
use Craft\Http\Route\RoutesCollection;

use app\Handler\Handler;
use app\Handler\HandlerInterface;
use app\Http\Middlewares\LoggingMiddleware;
use app\Strategies\StrategiesStoreInterface;
use app\Strategies\Addition;
use app\Strategies\Difference;
use app\Strategies\Division;
use app\Strategies\Multiplication;
use app\Strategies\StrategiesStore;

return [
    EventDispatcherInterface::class => function () {
        return new EventDispatcher(require_once('events.php'));
    },

    OptionsConfirm::class => function (DIContainer $container) {
        return new OptionsConfirm($container->make(EventDispatcherInterface::class));
    },

    StrategiesStoreInterface::class => function () {
        return new StrategiesStore([
            new Difference(),
            new Multiplication(),
            new Addition(),
            new Division(),
        ]);
    },

    RoutesCollectionInterface::class => new RoutesCollection(),

    MiddlewareInterface::class => new LoggingMiddleware(),

    RouterInterface::class => function (DIContainer $container) {
        return new Router(
            $container,
            $container->make(RoutesCollectionInterface::class),
            $container->make(MiddlewareInterface::class),
        );
    },

    RequestInterface::class => function () {
        return RequestFactory::createRequest();
    },

    ResponseInterface::class => new Response(),

    StreamInterface::class => new Stream(fopen('php://stdin', 'r')),

    HttpKernelInterface::class => function (DIContainer $container) {
        return new HttpKernel(
            $container->make(RequestInterface::class),
            $container->make(ResponseInterface::class),
            $container->make(RouterInterface::class),
        );
    },

    InputInterface::class => function () {
        return new Input($_SERVER['argv']);
    },

    OutputInterface::class => new Output(),

    ConsoleKernelInterface::class => function (DIContainer $container) {
        return new ConsoleKernel(
            $container,
            $container->make(InputInterface::class),
            $container->make(OutputInterface::class),
            $container->make(EventDispatcherInterface::class),
            require_once('plugins.php'),
        );
    },

    HandlerInterface::class => function (DIContainer $container) {
        return new Handler(
            $container->make(EventDispatcherInterface::class),
            $container->make(StrategiesStoreInterface::class),
        );
    },

    DataBaseConnectionInterface::class => function () {
        return (new ConnectionFactory)->createConnection(require_once('db-config.php'));
    },
];
