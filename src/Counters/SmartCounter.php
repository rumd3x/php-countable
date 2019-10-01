<?php

namespace Rumd3x\Countable\Counters;

use Rumd3x\Countable\Interfaces\Decrementable;
use Rumd3x\Countable\Interfaces\Incrementable;
use Rumd3x\Countable\Exceptions\NegativeQuantityException;

/**
 * SmartCounter is the same as StandardCounter, but it does not throw NegativeQuantityException
 * when trying to increment or decrement by negatives, instead it swiftly converts the value to a positive one.
 */
final class SmartCounter extends StandardCounter implements Incrementable, Decrementable
{
    /**
     * Increments the counter by incrementQuantity and returns the previous value
     *
     * @param integer $incrementQuantity
     * @return integer
     * @throws NegativeQuantityException
     */
    public function incrementBy(int $incrementQuantity): int
    {
        if ($incrementQuantity < 0) {
            $incrementQuantity = abs($incrementQuantity);
        }

        return parent::incrementBy($incrementQuantity);
    }

    /**
     * Decrements the counter by decrementQuantity and returns the previous value
     *
     * @param integer $decrementQuantity
     * @return integer
     * @throws NegativeQuantityException
     */
    public function decrementBy(int $decrementQuantity): int
    {
        if ($decrementQuantity < 0) {
            $decrementQuantity = abs($decrementQuantity);
        }

        return parent::decrementBy($decrementQuantity);
    }
}
