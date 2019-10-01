<?php

namespace Rumd3x\Countable\Counters;

use Rumd3x\Countable\Interfaces\Decrementable;
use Rumd3x\Countable\Interfaces\Incrementable;
use Rumd3x\Countable\Exceptions\NegativeQuantityException;

/**
 * StandardCounter holds a counter, and can increment or decrement its value by implementing
 * both Incrementable and Decrementable interfaces. It can also count to negatives.
 */
class StandardCounter extends BasicCounter implements Incrementable, Decrementable
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
            throw new NegativeQuantityException(sprintf("Cannot increment by negative value: %d", $incrementQuantity));
        }

        $old = $this->counter;
        $this->counter += $incrementQuantity;
        return $old;
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
            throw new NegativeQuantityException(sprintf("Cannot decrement by negative value: %d", $decrementQuantity));
        }

        $old = $this->counter;
        $this->counter -= $decrementQuantity;
        return $old;
    }
}
