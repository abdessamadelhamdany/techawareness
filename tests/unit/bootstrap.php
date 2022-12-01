<?php

$root_dir = dirname(dirname(__DIR__));

require_once $root_dir . '/vendor/autoload.php';

\Codeception\Util\Autoload::addNamespace('Techawareness', __DIR__ . '/../src');
