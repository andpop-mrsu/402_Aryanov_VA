<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Fraction;

class FractionTest extends TestCase
{
    public function testReduction()
    {
        $p = new Fraction(595, 721);
        $this -> assertSame(85, $p -> getNumer());
        $this -> assertSame(103, $p -> getDenom());
    }

    public function testTextRepresentation()
    {
        $p1 = new Fraction(25, 79);
        $p2 = new Fraction(71, 5);
        $this -> assertSame("25/79", $p1 -> __toString());
        $this -> assertSame("14'1/5", $p2 -> __toString());
    }

    public function testAdding()
    {
        $p1 = new Fraction(25, 79);
        $p2 = new Fraction(71, 5);
        $p3 = $p1 -> add($p2);
        $this -> assertEquals("14'204/395", $p3);
    }

    public function testSubtraction()
    {
        $p1 = new Fraction(25, 79);
        $p2 = new Fraction(751, 935);
        $p3 = $p1 -> sub($p2);
        $this -> assertEquals("-35954/73865", $p3);
        $p4 = new Fraction(71, 5);
        $p5 = $p1 -> sub($p4);
        $this -> assertEquals("-13'349/395", $p5);
    }
}
