<?php

namespace app\Observers;

use Craft\Components\EventDispatcher\EventMessage;

class ObserverStepCompleted implements ObserverInterface
{
    /**
     * @param EventMessage|null $message
     * @return void
     */
    public function update(EventMessage|null $message = null): void
    {
        $items = $message->getContent();
        $items['context']->log[] = $items['context']->total;
        $items['context']->goodCombination[] = $items['strategy']->getName();
    }
}
