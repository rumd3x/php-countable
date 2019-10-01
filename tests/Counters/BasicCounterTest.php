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
}
