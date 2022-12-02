<?php

namespace Tests\Unit\DataProviders;

use tad\FunctionMocker\FunctionMocker;
use Tests\Unit\Helpers\MockCommonAssertion;

use function Techawareness\Mocking\{fn_greeting, fn_is_long_name, fn_print_message};

class FunctionsTest extends \Tests\Unit\ABaseUnitTest
{
    use FunctionsProviders;

    /**
     * Test for function fn_is_long_name
     *
     * @dataProvider getFnIsLongNameProvider
     *
     * @param array $args function args argument
     * @param array $mock_return_values Mock functions return values
     * @param array $mock_assertions Mock assertion called/not_called
     * @param array $expected Expected values
     *
     * @return void
     */
    public function testFnIsLongName($args, $mock_return_values, $mock_assertions, $expected)
    {
        $mock_functions = [
            'strlen' => FunctionMocker::replace(
                'strlen',
                $mock_return_values['strlen'] ?? null
            ),
        ];

        $result = fn_is_long_name($args['name'], $args['long_length']);

        MockCommonAssertion::doMyMockAssertions($mock_functions, $mock_assertions);

        $this->assertEquals($expected, $result);
    }
}
