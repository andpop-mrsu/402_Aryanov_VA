<?php

namespace Tests\QueueTest;

use PHPUnit\Framework\TestCase;
use App\Queue;

class QueueTest extends TestCase
{
    public function test_EnqueueAndEmpty(): void
    {
        $queue = new Queue();
        self::assertTrue($queue->isEmpty());
        $queue->enqueue("5795", 979);
        self::assertFalse($queue->isEmpty());
    }

    public function test_Peek(): void
    {
        $queue = new Queue(5, 1, "151", "5151", 37);
        self::assertSame(5, $queue->peek());
    }

    public function test_Dequeue(): void
    {
        $queue1 = new Queue(3, 7, 9, 3, "57958", 57);
        $queue2 = new Queue();
        self::assertSame(3, $queue1->dequeue());
        self::assertSame(7, $queue1->peek());
        self::assertNull($queue2->dequeue());
    }

    public function test_TextRepresentation(): void
    {
        $queue = new Queue(5, 4, 3, 2, 1, "qwer", 333);
        self::assertSame("[5<-4<-3<-2<-1<-qwer<-333]", $queue->__toString());
    }

    public function test_Copy(): void
    {
        $queue = new Queue(5, 1, 62, 46, "579adgv", 43);
        $newQueue = $queue->copy();
        self::assertInstanceOf(Queue::class, $newQueue);
        self::assertFalse($newQueue->isEmpty());
        self::assertSame(5, $newQueue->peek());
    }
}
