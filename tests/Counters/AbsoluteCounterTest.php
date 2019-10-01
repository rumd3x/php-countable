<?php

use PHPUnit\Framework\TestCase;
use Rumd3x\Countable\Counters\AbsoluteCounter;
use Rumd3x\Countable\Interfaces\Decrementable;
use Rumd3x\Countable\Interfaces\Incrementable;
use Rumd3x\Countable\Exceptions\NegativeCounterException;
use Rumd3x\Countable\Exceptions\NegativeQuantityException;

class AbsoluteCounterTest extends TestCase
{
    public function testInstanciate()
    {
        $counter = new AbsoluteCounter();
        $counter2 = new AbsoluteCounter(159);
        $counter3 = new AbsoluteCounter(6);

        $this->assertInstanceOf(AbsoluteCounter::class, $counter);
        $this->assertInstanceOf(Incrementable::class, $counter);
        $this->assertInstanceOf(Decrementable::class, $counter);

        $this->assertEquals(0, $counter->getCounter());
        $this->assertEquals(159, $counter2->getCounter());
        $this->assertEquals(6, $counter3->getCounter());
    }

    public function testInstanciateThrowsExceptionOnNegative()
    {
        $this->expectException(NegativeQuantityException::class);

        new AbsoluteCounter(-3);
    }

    public function testIncrement()
    {
        $counter = new AbsoluteCounter();
        $counter2 = new AbsoluteCounter(159);
        $counter3 = new AbsoluteCounter(6);

        $counter->increment();
        $counter2->increment();
        $counter3->increment();

        $this->assertEquals(1, $counter->getCounter());
        $this->assertEquals(160, $counter2->getCounter());
        $this->assertEquals(7, $counter3->getCounter());
    }

    public function testIncrementBy()
    {
        $counter = new AbsoluteCounter(159);
        $counter2 = new AbsoluteCounter(6);
        $counter3 = new AbsoluteCounter(12);

        $counter->incrementBy(2);
        $counter2->incrementBy(6);
        $counter3->incrementBy(12);

        $this->assertEquals(161, $counter->getCounter());
        $this->assertEquals(12, $counter2->getCounter());
        $this->assertEquals(24, $counter3->getCounter());
    }

    public function testDecrement()
    {
        $counter = new AbsoluteCounter(1);
        $counter2 = new AbsoluteCounter(159);
        $counter3 = new AbsoluteCounter(6);

        $counter->decrement();
        $counter2->decrement();
        $counter3->decrement();

        $this->assertEquals(0, $counter->getCounter());
        $this->assertEquals(158, $counter2->getCounter());
        $this->assertEquals(5, $counter3->getCounter());
    }

    public function testDecrementThrowExceptionPastZero()
    {
        $this->expectException(NegativeCounterException::class);
        $counter = new AbsoluteCounter();
        $counter->decrement();
    }

    public function testDecrementBy()
    {
        $counter = new AbsoluteCounter(159);
        $counter2 = new AbsoluteCounter(6);

        $counter->decrementBy(150);
        $counter2->decrementBy(6);

        $this->assertEquals(9, $counter->getCounter());
        $this->assertEquals(0, $counter2->getCounter());
    }

    public function testDecrementByThrowExceptionPastZero()
    {
        $counters = [
            '11' => new AbsoluteCounter(10),
            '1000' => new AbsoluteCounter(777),
            '1' => new AbsoluteCounter(),
        ];

        foreach ($counters as $decrement => $counter) {
            $this->expectException(NegativeCounterException::class);
            $counter->decrement((int) $decrement);
        }
    }

    public function testDecrementByThrowsExceptionOnNegative()
    {
        $this->expectException(NegativeQuantityException::class);

        $counter = new AbsoluteCounter(123);
        $counter->decrementBy(-1);
    }
}
