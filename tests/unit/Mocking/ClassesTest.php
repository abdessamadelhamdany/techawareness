<?php

namespace Tests\Unit\Mocking;

use Codeception\Stub\Expected;
use Mockery;
use tad\FunctionMocker\FunctionMocker;
use Techawareness\Mocking\{Calculator, Division};

class ClassesTest extends \Tests\Unit\ABaseUnitTest
{
    public function testCalculate()
    {
        $calculator = new Calculator();

        $result = $calculator->calculate(1, 2, '+');
        $this->assertEquals(3, $result);

        $result = $calculator->calculate(6, 2, '-');
        $this->assertEquals(4, $result);

        $result = $calculator->calculate(5, 2, 'x');
        $this->assertEquals(10, $result);

        $result = $calculator->calculate(5, 2, '%');
        $this->assertEquals(0, $result);

        $div_result = 3;
        $mock_division_instance = $this->make(Division::class, [
            'divide' => Expected::once($div_result),
        ]);
        $mock_division_instance->expects($this->exactly(1))
            ->method('divide')
            ->with(6, 2);

        FunctionMocker::replace(Division::class . '::getInstance', $mock_division_instance);

        $result = $calculator->calculate(6, 2, '/');
        $this->assertEquals($div_result, $result);
    }
}
