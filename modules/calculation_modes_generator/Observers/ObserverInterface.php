<?php

namespace app\Observers;

use Craft\Components\EventDispatcher\EventMessage;

interface ObserverInterface
{
    /**
     * @param EventMessage|null $message
     * @return void
     */
    public function update(EventMessage|null $message = null): void;
}
