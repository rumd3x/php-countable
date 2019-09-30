<?php

namespace Rumd3x\Countable\Counters;

use Rumd3x\Countable\Interfaces\Decrementable;
use Rumd3x\Countable\Interfaces\Incrementable;
use Rumd3x\Countable\Exceptions\NegativeCounterException;
use Rumd3x\Countable\Exceptions\NegativeQuantityException;

/**
 * The AbsoluteCounter is just like a StandardCounter but throws NegativeCounterExpcetion
 * if tries the program tries to decrement past 0. It ensures the counter is always positive.
 */
final class AbsoluteCounter extends StandardCounter implements Incrementable, Decrementable
{
    /**
     * Instantiates a new counter holding initialValue
     *
     * @param integer $initialValue
     * @throws NegativeQuantityException
     */
    public function __construct(int $initialValue = 0)
    {
        if ($initialValue < 0) {
            throw new NegativeQuantityException(sprintf("Cannot initialize AbsoluteCounter with negative value %d:", $initialValue));
        }

        $this->counter = $initialValue;
    }

    /**
     * Decrements the counter by one and returns the previous value
     *
     * @return integer
     */
    public function decrement(): int
    {
        if ($this->counter <= 0) {
            throw new NegativeCounterException("Cannot decrement past 0");
        }

        return parent::decrement();
    }

    /**
     * Decrements the counter by decrementQuantity and returns the previous value
     *
     * @param integer $decrementQuantity
     * @return integer
     * @throws NegativeValueException
     */
    public function decrementBy(int $decrementQuantity): int
    {
        if ($decrementQuantity > $this->counter) {
            throw new NegativeCounterException(sprintf("Cannot decrement %d from the current counter: %d", $decrementQuantity, $this->counter));
        }

        return parent::decrementBy($decrementQuantity);
    }
}
