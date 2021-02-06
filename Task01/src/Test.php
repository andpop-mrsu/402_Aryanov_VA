<?php

namespace App\Test;

use App\Fraction;

function runTest()
{
    $m1 = new Fraction(25, 79);
    echo $m1 . "\n"; // 25/79

    $m2 = new Fraction(71, 5);
    echo $m2 . "\n"; // 14'1/5

    $m3 = $m1 -> add($m2);
    echo $m3 . "\n"; // 14'204/395

    $m4 = new Fraction(751, 935);
    $m5 = $m1 -> sub($m4);
    echo $m5 . "\n"; // -35954/73865

    $m6 = new Fraction(595, 721);
    echo $m6 . "\n"; // 85/103
    echo $m6 -> getNumer() . "\n"; // 85
    echo $m6 -> getDenom() . "\n"; // 103

    $m7 = $m1 -> sub($m2);
    echo $m7 . "\n"; // -13'349/395
}
