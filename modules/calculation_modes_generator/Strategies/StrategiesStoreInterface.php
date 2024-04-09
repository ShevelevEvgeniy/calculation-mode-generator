<?php

namespace app\Strategies;

interface StrategiesStoreInterface
{
    /**
     * @return array
     */
    public function allStrategies(): array;

    /**
     * @param StrategyInterface $strategy
     * @return void
     */
    public function addStrategy(StrategyInterface $strategy): void;

    /**
     * @param StrategyInterface $strategy
     * @return void
     */
    public function removeStrategy(StrategyInterface $strategy): void;

    /**
     * @param array $config
     * @return void
     */
    public function configure(array $config): void;
}
