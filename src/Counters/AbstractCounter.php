<?php

namespace Rumd3x\Countable\Counters;

abstract class AbstractCounter
{

    /**
     * The current counter
     *
     * @var int
     */
    protected $counter = 0;

    /**
     * Instantiates a new counter holding initialValue
     *
     * @param integer $initialValue
     */
    public function __construct(int $initialValue = 0)
    {
        $this->counter = $initialValue;
    }

    /**
     * Retrieve the current counter value
     *
     * @return integer
     */
    public function getCounter(): int
    {
        return $this->counter;
    }

    /**
     * Returns true if the counter is zero, false otherwise
     *
     * @return boolean
     */
    public function isZero(): bool
    {
        return $this->counter === 0;
    }

    /**
     * Returns true if the counter is less than zero, false otherwise
     *
     * @return boolean
     */
    public function isNegative(): bool
    {
        return $this->counter < 0;
    }

    /**
     * Returns true if the counter is greater than zero, false otherwise
     *
     * @return boolean
     */
    public function isPositive(): bool
    {
        return $this->counter > 0;
    }
}
