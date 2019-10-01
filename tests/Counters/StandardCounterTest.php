<?php

use PHPUnit\Framework\TestCase;
use Rumd3x\Countable\Counters\StandardCounter;
use Rumd3x\Countable\Interfaces\Decrementable;
use Rumd3x\Countable\Interfaces\Incrementable;
use Rumd3x\Countable\Exceptions\NegativeCounterException;
use Rumd3x\Countable\Exceptions\NegativeQuantityException;

class StandardCounterTest extends TestCase
{
    public function testInstanciate()
    {
        $counter = new StandardCounter();
        $counter2 = new StandardCounter(159);
        $counter3 = new StandardCounter(-6);

        $this->assertInstanceOf(StandardCounter::class, $counter);
        $this->assertInstanceOf(Incrementable::class, $counter);
        $this->assertInstanceOf(Decrementable::class, $counter);

        $this->assertEquals(0, $counter->getCounter());
        $this->assertEquals(159, $counter2->getCounter());
        $this->assertEquals(-6, $counter3->getCounter());
    }

    public function testIncrement()
    {
        $counter = new StandardCounter();
        $counter2 = new StandardCounter(159);
        $counter3 = new StandardCounter(-6);

        $counter->increment();
        $counter2->increment();
        $counter3->increment();

        $this->assertEquals(1, $counter->getCounter());
        $this->assertEquals(160, $counter2->getCounter());
        $this->assertEquals(-5, $counter3->getCounter());
    }

    public function testIncrementBy()
    {
        $counter = new StandardCounter(159);
        $counter2 = new StandardCounter(-6);

        $counter->incrementBy(2);
        $counter2->incrementBy(6);

        $this->assertEquals(161, $counter->getCounter());
        $this->assertEquals(0, $counter2->getCounter());
    }

    public function testIncrementByThrowsExceptionOnNegative()
    {
        $this->expectException(NegativeQuantityException::class);

        $counter = new StandardCounter(123);
        $counter->incrementBy(-1);
    }

    public function testDecrement()
    {
        $counter = new StandardCounter();
        $counter2 = new StandardCounter(159);
        $counter3 = new StandardCounter(-6);

        $counter->decrement();
        $counter2->decrement();
        $counter3->decrement();

        $this->assertEquals(-1, $counter->getCounter());
        $this->assertEquals(158, $counter2->getCounter());
        $this->assertEquals(-7, $counter3->getCounter());
    }

    public function testDecrementBy()
    {
        $counter = new StandardCounter(159);
        $counter2 = new StandardCounter(-6);

        $counter->decrementBy(160);
        $counter2->decrementBy(6);

        $this->assertEquals(-1, $counter->getCounter());
        $this->assertEquals(-12, $counter2->getCounter());
    }

    public function testDecrementByThrowsExceptionOnNegative()
    {
        $this->expectException(NegativeQuantityException::class);

        $counter = new StandardCounter(123);
        $counter->decrementBy(-1);
    }
}
