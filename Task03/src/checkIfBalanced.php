<?php

namespace App;

function checkIfBalanced(string $expression): bool
{
    $limit = strlen($expression);
    $openingSymbols = ["<", "[", "{", "("];
    $closingSymbols = [">", "]", "}", ")"];

    $stack = new Stack($limit);
    for ($i = 0; $i < $limit; $i++) {
        if (in_array($expression[$i], $openingSymbols)) {
            $stack->push($expression[$i]);
        } elseif (in_array($expression[$i], $closingSymbols)) {
            if ($stack->isEmpty()) {
                return false;
            }

            if (preg_match("/\{\}|\[\]|\<\>|\(\)/", $stack->top() . $expression[$i])) {
                $stack->pop();
            } else {
                return false;
            }
        }
    }

    return $stack->isEmpty();
}