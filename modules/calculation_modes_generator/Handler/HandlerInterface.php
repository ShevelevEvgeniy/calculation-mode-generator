<?php

namespace app\Handler;

use app\DTO\DTO;

interface HandlerInterface
{
    /**
     * @param DTO $context
     * @return void
     */
    public function handle(DTO $context): void;
}
