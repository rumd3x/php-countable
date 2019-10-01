<?php

use PHPUnit\Framework\TestCase;
use Rumd3x\Countable\Counters\BasicCounter;
use Rumd3x\Countable\Interfaces\Decrementable;
use Rumd3x\Countable\Interfaces\Incrementable;

class BasicCounterTest extends TestCase
{
    public function testInstanciate()
    {
        $counter = new BasicCounter();
        $counter2 = new BasicCounter(159);
        $counter3 = new BasicCounter(-6);

        $this->assertInstanceOf(BasicCounter::class, $counter);
        $this->assertInstanceOf(Incrementable::class, $counter);
        $this->assertInstanceOf(Decrementable::class, $counter);

        $this->assertEquals(0, $counter->getCounter());
        $this->assertEquals(159, $counter2->getCounter());
        $this->assertEquals(-6, $counter3->getCounter());
    }

    public function testEquals()
    {
        $counter1 = new BasicCounter();
        $counter2 = new BasicCounter(777);
        $counter3 = new BasicCounter(-8001);

        $this->assertTrue($counter1->isZero());
        $this->assertFalse($counter1->isPositive());
        $this->assertFalse($counter1->isNegative());

        $this->assertFalse($counter2->isZero());
        $this->assertTrue($counter2->isPositive());
        $this->assertFalse($counter2->isNegative());

        $this->assertFalse($counter3->isZero());
        $this->assertFalse($counter3->isPositive());
        $this->assertTrue($counter3->isNegative());
    }

    public function testIncrement()
    {
        $counter = new BasicCounter();
        $counter2 = new BasicCounter(159);
        $counter3 = new BasicCounter(-6);

        $counter->increment();
        $counter2->increment();
        $counter3->increment();

        $this->assertEquals(1, $counter->getCounter());
        $this->assertEquals(160, $counter2->getCounter());
        $this->assertEquals(-5, $counter3->getCounter());
    }

    public function testIncrementBy()
    {
        $counter = new BasicCounter(159);
        $counter2 = new BasicCounter(-6);
        $counter3 = new BasicCounter(-12);

        $counter->incrementBy(2);
        $counter2->incrementBy(6);
        $counter3->incrementBy(-12);

        $this->assertEquals(161, $counter->getCounter());
        $this->assertEquals(0, $counter2->getCounter());
        $this->assertEquals(-24, $counter3->getCounter());
    }

    public function testDecrement()
    {
        $counter = new BasicCounter();
        $counter2 = new BasicCounter(159);
        $counter3 = new BasicCounter(-6);

        $counter->decrement();
        $counter2->decrement();
        $counter3->decrement();

        $this->assertEquals(-1, $counter->getCounter());
        $this->assertEquals(158, $counter2->getCounter());
        $this->assertEquals(-7, $counter3->getCounter());
    }

    public function testDecrementBy()
    {
        $counter = new BasicCounter(159);
        $counter2 = new BasicCounter(-6);

        $counter->decrementBy(160);
        $counter2->decrementBy(-6);

        $this->assertEquals(-1, $counter->getCounter());
        $this->assertEquals(0, $counter2->getCounter());
    }
}
