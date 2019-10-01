# php-countable

Library providing several Object Oriented utilities for Counting stuff.

[![Build Status](https://travis-ci.org/rumd3x/php-countable.svg?branch=master)](https://travis-ci.org/rumd3x/php-countable)
![Codecov](https://img.shields.io/codecov/c/github/rumd3x/php-countable.svg)
![PHP Version](https://img.shields.io/packagist/php-v/rumd3x/php-countable.svg)

## Install

```sh
composer require rumd3x/php-countable
```

## Usage Examples

- As a while loop exit condition:

```php
use use Rumd3x\Countable\Counters\BasicCounter;

$counter = new BasicCounter(10);

while (!$counter->isZero()) {
    // Do stuff...
    $counter->decrement();
}
```

- As an iterator counter:

```php
use use Rumd3x\Countable\Counters\BasicCounter;

$counter = new BasicCounter();

foreach($myArrayOfStuff as $value) {
    // Do stuff...

    $counter->incrementBy($value->quantity);
}

echo "Found {$counter->getCounter()} stuff";
```

## API Description

This Library provides:

- 2 counter interfaces `Decrementable` and `Incrementable`.
- A basic `AbstractCounter` that can be extended upon.
- 4 counter implementations, all of them implementing both interfaces, and using `AbstractCounter` as a base.

The `Incrementable` and `Decrementable` interfaces provides the following methods:

```php
    /** Incrementable **/
    public function increment(): int; // Increment the counter by one and returns the previous value
    public function incrementBy(int $incrementQuantity): int; //Increments the counter by incrementQuantity and returns the previous value

    /** Decrementable **/
    public function decrement(): int; // Decrements the counter by one and returns the previous value
    public function decrementBy(int $decrementQuantity): int; // Decrements the counter by decrementQuantity and returns the previous value
```

*Each Counter implementation handles incrementing and decrementing the counter differently:*

### BasicCounter

`Rumd3x\Countable\Counters\BasicCounter`

It is the most basic implementation of both Incrementable and Decrementable interfaces, it does not do any transformation with your inputs, and does not raise any Exceptions.

### StandardCounter

`Rumd3x\Countable\Counters\StandardCounter`

StandardCounter holds a counter, and can increment or decrement its value by implementing both Incrementable and Decrementable interfaces. It can also count to negatives.

### SmartCounter

`Rumd3x\Countable\Counters\SmartCounter`

SmartCounter is the same as StandardCounter, but it does not throw `Rumd3x\Countable\Exceptions\NegativeQuantityException` when trying to increment or decrement by negatives, instead it swiftly converts the value to a positive one.

### AbsoluteCounter

`Rumd3x\Countable\Counters\AbsoluteCounter`

The AbsoluteCounter is just like a StandardCounter but throws `Rumd3x\Countable\Exceptions\NegativeCounterExpcetion` if tries the program tries to decrement past 0. It ensures the counter is always positive.

### AbstractCounter

The `AbstractCounter` implements the following methods below:
(Which makes it also available for all 4 Counter implementations provided by the library)

```php
    /**
     * Retrieve the current counter value
     * @return integer
     */
    public function getCounter(): int;

    /**
     * Returns true if the counter is zero, false otherwise
     * @return boolean
     */
    public function isZero(): bool;

    /**
     * Returns true if the counter is less than zero, false otherwise
     * @return boolean
     */
    public function isNegative(): bool;

    /**
     * Returns true if the counter is greater than zero, false otherwise
     * @return boolean
     */
    public function isPositive(): bool;
```
