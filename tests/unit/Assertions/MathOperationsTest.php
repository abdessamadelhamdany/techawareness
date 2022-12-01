<?php

namespace Tests\Unit\Assertions;

use Mockery;
use SomeFunction;
use Tests\Unit\ABaseUnitTest;

class MathOperationsTest extends ABaseUnitTest
{
    public static $functions;

    /**
     * Before tests function
     * @return void
     */
    public function _before(): void
    {
        parent::_before();
        self::$functions = Mockery::mock();
    }

    public function testFnEven()
    {
        $result = fn_even(5);
        $this->assertFalse($result);
    }

    public function testFnCalc()
    {
        $mock = Mockery::mock('overload:' . SomeFunction::class, [
            'add' => 10,
        ]);

        $mock->shouldReceive(3, 4)
            ->andReturn(10);
        $result = fn_calc(5, 5, '+');

        $this->assertEquals(10, $result);
    }
}
