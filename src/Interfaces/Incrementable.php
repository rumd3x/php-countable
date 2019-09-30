<?php

namespace Rumd3x\Countable\Interfaces;

interface Incrementable
{
    public function increment(): int;
    public function incrementBy(int $incrementQuantity): int;
}
