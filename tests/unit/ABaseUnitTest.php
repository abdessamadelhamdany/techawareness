<?php

namespace Tests\Unit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use tad\FunctionMocker\FunctionMocker;

abstract class ABaseUnitTest extends \Codeception\Test\Unit
{
    use MockeryPHPUnitIntegration;

    protected function _before()
    {
        FunctionMocker::setUp();
        parent::_before();
    }

    protected function _after()
    {
        parent::_after();
        FunctionMocker::tearDown();
    }
}
