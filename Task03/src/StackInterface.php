<?php

namespace App;

interface StackInterface
{
    public function push(...$elements);

    public function pop();

    public function top();

    public function isEmpty(): bool;

    public function copy(): Stack;

    public function __toString(): string;
}