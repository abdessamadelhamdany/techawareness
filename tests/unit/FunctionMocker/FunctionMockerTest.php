<?php

namespace Tests\Unit\FunctionMocker;

use tad\FunctionMocker\FunctionMocker;

require_once 'fn.function-mocker.php';

class FunctionMockerTest extends \Tests\Unit\ABaseUnitTest
{
    public function testFnIsLongName()
    {
        $long_length = 6;
        $mock_strlen = FunctionMocker::replace('strlen', 5);
        $result = fn_is_long_name('Cristiano', $long_length);
        $mock_strlen->wasCalledWithOnce(['Cristiano']);
        $this->assertTrue($result);

        // $mock_strlen = FunctionMocker::replace('strlen', 5);
        // $result = fn_is_long_name('Cristiano', $long_length);
        // $this->assertFalse($result);
    }

    // testFnPrintMessage
    // testFnGreeting
}
