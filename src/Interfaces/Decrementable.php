<?php

namespace Rumd3x\Countable\Interfaces;

interface Decrementable
{
    public function decrement(): int;
    public function decrementBy(int $decrementQuantity): int;
}
