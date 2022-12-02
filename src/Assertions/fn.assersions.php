<?php

namespace Techawareness\Assertions;

function fn_even(int $num): bool
{
    return $num % 2 === 0;
}

function fn_add(int $x, int $y): int
{
    return $x + $y;
}

function fn_push(int $item, array &$array): void
{
    $array[] = $item;
}

function fn_array_push(int $item, array $array = []): array
{
    $array[] = $item;
    return $array;
}

function fn_division(float $x, float $y): float
{
    if ($y === 0.0) {
        throw new \Exception('Operation denied');
    }

    return $x / $y;
}
