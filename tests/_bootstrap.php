<?php
require_once __DIR__ . '/../vendor/autoload.php';

\tad\FunctionMocker\FunctionMocker::init([
    'whitelist' => [dirname(dirname(__FILE__)) . '/src'],
    'redefinable-internals' => ['strlen']
]);

foreach (glob(dirname(dirname(__FILE__)) . '/src/**/*.php') as $file) {
    include $file;
}
