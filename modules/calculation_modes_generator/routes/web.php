<?php

use Craft\Contracts\RoutesCollectionInterface;
use Craft\Contracts\ContainerInterface;

use app\Controllers\api\v1\CalculationApiController;
use app\Controllers\CalculationController;

/** @var ContainerInterface $container */

$container->singleton(RoutesCollectionInterface::class);

$collection = $container->make(RoutesCollectionInterface::class);

$collection->get('/calculation/calculate?{firstNumber|type:numeric}{?secondNumber|type:numeric|default:300}', CalculationController::class . '::actionCalculate');

$collection->get('/api/v1/modes-generator/calculate-modes?{firstNumber|type:numeric}{?secondNumber|type:numeric|default:300}', CalculationApiController::class . '::actionCalculate');
