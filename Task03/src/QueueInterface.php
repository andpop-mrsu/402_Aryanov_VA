<?php

namespace App;

interface QueueInterface
{
    /**
     * @param mixed ...$elements
     */
    public function enqueue(...$elements): void;

    /**
     * @return mixed|null
     */
    public function dequeue();

    /**
     * @return mixed|null
     */
    public function peek();

    public function isEmpty(): bool;

    public function copy(): Queue;

    public function __toString(): string;
}
