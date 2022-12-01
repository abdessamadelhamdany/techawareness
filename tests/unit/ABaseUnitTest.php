<?php

namespace Tests\Unit;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use tad\FunctionMocker\FunctionMocker;

abstract class ABaseUnitTest extends \Codeception\Test\Unit
{
    use MockeryPHPUnitIntegration;

    /**
     * framework dependant name
     * Called before the tests are executed
     * @return void
     */
    protected function _before()
    {
        parent::_before();
        FunctionMocker::setUp();
    }

    /**
     * framework dependant name
     * Called after the tests have been executed
     * @return void
     */
    protected function _after()
    {
        parent::_after();
        Mockery::close();
        FunctionMocker::tearDown();
    }
}
