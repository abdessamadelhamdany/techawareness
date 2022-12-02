<?php
require_once __DIR__ . '/../vendor/autoload.php';

\tad\FunctionMocker\FunctionMocker::init([
    'whitelist' => [dirname(dirname(__FILE__)) . '/src'],
    'redefinable-internals' => ['strlen', 'var_dump']
]);

foreach (glob(dirname(dirname(__FILE__)) . '/src/**/*.php') as $file) {
    include $file;
}
