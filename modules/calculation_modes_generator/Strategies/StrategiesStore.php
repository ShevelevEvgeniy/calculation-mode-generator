<?php

namespace app\Strategies;

class StrategiesStore implements StrategiesStoreInterface
{
    public function __construct(private array $strategies) { }

    /**
     * @param array $config
     * @return void
     */
    public function configure(array $config): void
    {
        foreach ($config as $strategy) {
            $this->addStrategy($strategy);
        }
    }

    /**
     * @return array
     */
    public function allStrategies(): array
    {
        return $this->strategies;
    }

    /**
     * @param StrategyInterface $strategy
     * @return void
     */
    public function addStrategy(StrategyInterface $strategy): void
    {
        if (in_array($strategy, $this->strategies)) {
            return;
        }

        $this->strategies[] = $strategy;
    }

    /**
     * @param StrategyInterface $strategy
     * @return void
     */
    public function removeStrategy(StrategyInterface $strategy): void
    {
        $keyToRemove = array_search($strategy, $this->strategies);
        if ($keyToRemove !== false) {
            unset($this->strategies[$keyToRemove]);
        }
    }
}
