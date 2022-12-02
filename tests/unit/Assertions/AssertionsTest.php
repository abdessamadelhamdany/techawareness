<?php

namespace Assertions;

class AssertionsTest extends \Codeception\Test\Unit
{
    public function testFnEven()
    {
        $result = fn_even(5);
        $this->assertFalse($result);

        $result = fn_even(8);
        $this->assertTrue($result);
    }

    public function testFnAdd()
    {
        $result = fn_add(3, 7);
        $this->assertEquals(10, $result);

        $result = fn_add(6, 9);
        $this->assertEquals(15, $result);
    }

    public function testFnPush()
    {
        $array = [];
        fn_push(3, $array);
        $this->assertEquals([3], $array);

        $array = [5, 6];
        fn_push(4, $array);
        $this->assertEquals([5, 6, 4], $array);
    }

    public function testFnArrayPush()
    {
        $result = fn_array_push(3);
        $this->assertEquals([3], $result);

        $result = fn_array_push(4, [2, 5]);
        $this->assertEquals([2, 5, 4], $result);
    }

    public function testFnDivision()
    {
        $result = fn_division(6.0, 3.0);
        $this->assertEquals(2.0, $result);

        $this->expectException(\Exception::class);
        $result = fn_division(4.0, 0.0);
    }
}
