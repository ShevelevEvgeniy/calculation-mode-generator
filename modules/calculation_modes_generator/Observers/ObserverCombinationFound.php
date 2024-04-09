<?php

namespace app\Observers;

use Craft\Components\EventDispatcher\EventMessage;

class ObserverCombinationFound implements ObserverInterface
{
    /**
     * @param EventMessage|null $message
     * @return void
     */
    public function update(EventMessage|null $message = null): void
    { }
}
