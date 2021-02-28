<?php
namespace Tests\StackTest;

use App\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function test_push_exceedingLimit_noSolution(): void
    {
        $stack = new Stack(1);
        $stack->push("Text");

        $this->expectExceptionCode(1);
        $stack->push("Text2");
    }

    public function test_pop_isPositive(): void
    {
        $stack = new Stack(1);

        self::assertEquals(null, $stack->pop());
    }

    public function test_top_isPositive(): void
    {
        $stack = new Stack(1);
        $stack->push(1);

        self::assertEquals(1, $stack->top());
    }

    public function test_isEmpty_checkingThatStackNotEmpty_false(): void
    {
        $stack = new Stack(1);
        $stack->push(1);

        self::assertFalse($stack->isEmpty());
    }

    public function test_copy_isPositive(): void
    {
        $stack = new Stack(4);
        $stack->push(1,2,3,4);

        $stack1 = $stack->copy();

        self::assertEquals($stack, $stack1);
    }
}