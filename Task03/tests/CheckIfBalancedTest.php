<?php

namespace Tests\CheckIfBalancedTest;

use PHPUnit\Framework\TestCase;

use function App\checkIfBalanced;

class CheckIfBalancedTest extends TestCase
{
    public function test_CheckIfBalanced(): void
    {
        self:: assertTrue(checkIfBalanced("(ab[cd{}])"));
        self:: assertFalse(checkIfBalanced("(ab[cd{})"));
        self:: assertFalse(checkIfBalanced("(ab[cd{]})"));
    }
}
