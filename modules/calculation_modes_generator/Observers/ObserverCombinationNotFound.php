<?php

namespace app\Observers;

use Craft\Components\EventDispatcher\EventMessage;

class ObserverCombinationNotFound implements ObserverInterface
{
    /**
     * @param EventMessage|null $message
     * @return void
     */
    public function update(EventMessage|null $message = null): void
    {
        $items = $message->getContent();
        $items['context']->combination = [];
    }
}
