<?php

namespace Tests\Unit\DataProviders;

use Codeception\Stub\Expected;
use Mockery;
use tad\FunctionMocker\FunctionMocker;
use Techawareness\Mocking\{Calculator, Division};

class ClassesTest extends \Tests\Unit\ABaseUnitTest
{
    use ClassesProviders;

    /**
     * Test for class Calculator
     *
     * @dataProvider getCalculateProvider
     *
     * @param array $args function args argument
     * @param array $mock_return_values Mock functions return values
     * @param array $mock_assertions Mock assertion called/not_called
     * @param array $mock_manual_assertions a key/value pair to toggler between once/never
     * @param array $expected Expected values
     *
     * @return void
     */
    public function testCalculate($args, $mock_manual_assertions, $expected)
    {
        $calculator = new Calculator();

        $mock_division_instance = $this->make(Division::class, [
            'divide' => $mock_manual_assertions['divide'] ?
                Expected::once($mock_manual_assertions['divide']['return']) : Expected::never(),
        ]);
        if ($mock_manual_assertions['divide']) {
            [$x, $y] = $mock_manual_assertions['divide']['with'];
            $mock_division_instance->expects($this->exactly(1))
                ->method('divide')
                ->with($x, $y);
        }
        FunctionMocker::replace(Division::class . '::getInstance', $mock_division_instance);

        if ($args['y'] === 0) {
            $this->expectException(\Exception::class);
        }

        $result = $calculator->calculate($args['x'], $args['y'], $args['op']);
        $this->assertEquals($expected, $result);
    }
}
