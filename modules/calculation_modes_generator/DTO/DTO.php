<?php

namespace app\DTO;

class DTO
{
    /**
     * @var int
     */
    public int $total = 0;

    /**
     * @var array
     */
    public array $log = [];

    /**
     * @var array
     */
    public array $combination = [];

    /**
     * @var array
     */
    public array $goodCombination = [];

    /**
     * @var int
     */
    public int $countAttempts = 0;

    /**
     * @param int $firstNumber
     * @param int $secondNumber
     */
    public function __construct(public int $firstNumber, public int $secondNumber) { }
}
