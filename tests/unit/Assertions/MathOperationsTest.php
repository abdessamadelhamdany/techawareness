<?php

namespace Assertions;

use function Techawareness\Assertions\fn_even;

class MathOperationsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testFnEven()
    {
        $result = fn_even(5);
        $this->assertFalse($result);
    }
}
