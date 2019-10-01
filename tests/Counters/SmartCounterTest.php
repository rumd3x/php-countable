<?php

use PHPUnit\Framework\TestCase;
use Rumd3x\Countable\Counters\SmartCounter;
use Rumd3x\Countable\Interfaces\Decrementable;
use Rumd3x\Countable\Interfaces\Incrementable;

class SmartCounterTest extends TestCase
{
    public function testInstanciate()
    {
        $counter = new SmartCounter();
        $counter2 = new SmartCounter(159);
        $counter3 = new SmartCounter(-6);

        $this->assertInstanceOf(SmartCounter::class, $counter);
        $this->assertInstanceOf(Incrementable::class, $counter);
        $this->assertInstanceOf(Decrementable::class, $counter);

        $this->assertEquals(0, $counter->getCounter());
        $this->assertEquals(159, $counter2->getCounter());
        $this->assertEquals(-6, $counter3->getCounter());
    }

    public function testIncrement()
    {
        $counter = new SmartCounter();
        $counter2 = new SmartCounter(159);
        $counter3 = new SmartCounter(-6);

        $counter->increment();
        $counter2->increment();
        $counter3->increment();

        $this->assertEquals(1, $counter->getCounter());
        $this->assertEquals(160, $counter2->getCounter());
        $this->assertEquals(-5, $counter3->getCounter());
    }

    public function testIncrementBy()
    {
        $counter = new SmartCounter(159);
        $counter2 = new SmartCounter(-6);
        $counter3 = new SmartCounter(-12);

        $counter->incrementBy(2);
        $counter2->incrementBy(6);
        $counter3->incrementBy(-12);

        $this->assertEquals(161, $counter->getCounter());
        $this->assertEquals(0, $counter2->getCounter());
        $this->assertEquals(0, $counter3->getCounter());
    }

    public function testDecrement()
    {
        $counter = new SmartCounter();
        $counter2 = new SmartCounter(159);
        $counter3 = new SmartCounter(-6);

        $counter->decrement();
        $counter2->decrement();
        $counter3->decrement();

        $this->assertEquals(-1, $counter->getCounter());
        $this->assertEquals(158, $counter2->getCounter());
        $this->assertEquals(-7, $counter3->getCounter());
    }

    public function testDecrementBy()
    {
        $counter = new SmartCounter(159);
        $counter2 = new SmartCounter(-6);

        $counter->decrementBy(160);
        $counter2->decrementBy(-6);

        $this->assertEquals(-1, $counter->getCounter());
        $this->assertEquals(-12, $counter2->getCounter());
    }
}
