<?php

namespace Tests\Unit\Mocking;

use tad\FunctionMocker\FunctionMocker;

use function Techawareness\Mocking\{fn_greeting, fn_is_long_name, fn_print_message};

class MockingTest extends \Tests\Unit\ABaseUnitTest
{
    public function testFnIsLongName()
    {
        $long_length = 6;

        $mock_strlen = FunctionMocker::replace('strlen', 5);
        $result = fn_is_long_name('Cristiano', $long_length);
        $mock_strlen->wasCalledWithOnce(['Cristiano']);
        $this->assertFalse($result);

        $mock_strlen = FunctionMocker::replace('strlen', 10);
        $result = fn_is_long_name('Cristiano', $long_length);
        $mock_strlen->wasCalledWithOnce(['Cristiano']);
        $this->assertTrue($result);
    }

    public function testFnPrintMessage()
    {
        $mock_var_dump = FunctionMocker::replace('var_dump');
        fn_print_message('message 1', 'message 2');
        $mock_var_dump->wasCalledWithOnce(['message 1']);
        $mock_var_dump->wasCalledWithOnce(['message 2']);
    }

    public function testFnGreeting()
    {
        $name = 'Smith';

        $mock_fn_print_message = FunctionMocker::replace('Techawareness\Mocking\fn_print_message');
        fn_greeting($name);
        $mock_fn_print_message->wasCalledWithOnce(['Hello, ', $name]);

        $mock_fn_print_message = FunctionMocker::replace('Techawareness\Mocking\fn_print_message');
        fn_greeting($name, 'fr');
        $mock_fn_print_message->wasCalledWithOnce(['Salut, ', $name]);

        $mock_fn_print_message = FunctionMocker::replace('Techawareness\Mocking\fn_print_message');
        fn_greeting($name, 'xyz');
        $mock_fn_print_message->wasCalledWithOnce(['No greeting to you sir!']);
    }
}
