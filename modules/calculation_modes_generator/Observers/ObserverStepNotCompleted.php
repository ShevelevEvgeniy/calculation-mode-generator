<?php

namespace app\Observers;

use Craft\Components\EventDispatcher\EventMessage;

class ObserverStepNotCompleted implements ObserverInterface
{
    /**
     * @param EventMessage|null $message
     * @return void
     */
    public function update(EventMessage|null $message = null): void
    {
        $items = $message->getContent();
        $combination = [];

        foreach ($items['strategies'] as $strategy) {
            $combination[] = $strategy->getName();
        }

        $items['context']->combination[] = $combination;
        $items['context']->log = [];
        $items['context']->goodCombination = [];
    }
}
