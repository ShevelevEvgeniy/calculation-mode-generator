<?php

namespace app\Handler;

use Craft\Contracts\EventDispatcherInterface;
use Craft\Components\EventDispatcher\EventMessage;

use app\Strategies\StrategiesStoreInterface;
use app\Enums\CalculationEvent;
use app\DTO\DTO;

readonly class Handler implements HandlerInterface
{
    /**
     * @param EventDispatcherInterface $eventDispatcher
     * @param StrategiesStoreInterface $strategiesStore
     */
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        private StrategiesStoreInterface $strategiesStore,
        ) { }
    
    /**
     * @param DTO $context
     * @return void
     */
    public function handle(DTO $context): void
    {
        $strategies = $this->strategiesStore->allStrategies();

        while ($context->countAttempts < 50) {
            shuffle($strategies);

            foreach ($strategies as $strategy) {

                try {

                    $strategy->calculate($context);

                    $this->eventDispatcher->trigger(
                        CalculationEvent::STEP_COMPLETED,
                        new EventMessage(compact('context', 'strategy'))
                    );

                } catch (\LogicException $e) {

                    $this->eventDispatcher->trigger(
                        CalculationEvent::STEP_NOT_COMPLETED,
                        new EventMessage(compact('context', 'strategies'))
                    );

                    break;
                }
            }

            $context->countAttempts++;

            if ($context->goodCombination) {
                $this->eventDispatcher->trigger(
                    CalculationEvent::COMBINATION_FOUND,
                    new EventMessage($context->countAttempts)
                );

                return;
            }
        }

        $this->eventDispatcher->trigger(
            CalculationEvent::COMBINATION_NOT_FOUND,
            new EventMessage(compact('context')));
    }
}
