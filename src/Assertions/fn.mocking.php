<?php

function fn_calc(int $x, int $y, string $op): int
{
    $result = 0;
    if ($op === '+') {
        $result = (new SomeFunction())->add($x, $y);
    }
    return $result;
}
