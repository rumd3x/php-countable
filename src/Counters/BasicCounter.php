<?php

namespace Rumd3x\Countable\Counters;

use Rumd3x\Countable\Interfaces\Decrementable;
use Rumd3x\Countable\Interfaces\Incrementable;

/**
 * It is the most basic implementation of both Incrementable and Decrementable interfaces,
 * it does not do any transformation with your inputs, and does not raise any Exceptions
 */
class BasicCounter extends AbstractCounter implements Incrementable, Decrementable
{
    /**
     * Increment the counter by one and returns the previous value
     *
     * @return integer
     */
    public function increment(): int
    {
        return ++$this->counter;
    }

    /**
     * Increments the counter by incrementQuantity and returns the previous value
     *
     * @param integer $incrementQuantity
     * @return integer
     */
    public function incrementBy(int $incrementQuantity): int
    {
        $old = $this->counter;
        $this->counter += $incrementQuantity;
        return $old;
    }

    /**
     * Decrements the counter by one and returns the previous value
     *
     * @return integer
     */
    public function decrement(): int
    {
        return --$this->counter;
    }

    /**
     * Decrements the counter by decrementQuantity and returns the previous value
     *
     * @param integer $decrementQuantity
     * @return integer
     */
    public function decrementBy(int $decrementQuantity): int
    {
        $old = $this->counter;
        $this->counter -= $decrementQuantity;
        return $old;
    }
}
