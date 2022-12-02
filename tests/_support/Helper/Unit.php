<?php

namespace Helper;

use tad\FunctionMocker\FunctionMocker;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Unit extends \Codeception\Module
{
    // public function _initialize()
    // {
    //     \tad\FunctionMocker\FunctionMocker::init([
    //         'whitelist' => [codecept_root_dir() . '/src', codecept_root_dir() . '/vendor'],
    //     ]);
    // }
}
