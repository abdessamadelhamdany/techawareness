./vendor/bin/codecept g:test unit file/path # without Test.php
./vendor/bin/codecept g:test unit Assertions/Assertions # will generate tests/unit/Assertions/AssertionsTest.php

./vendor/bin/codecept run tests/unit # run all tests inside a directory
./vendor/bin/codecept run tests/unit/Assertions/AssertionsTest.php # run all tests inside a file
./vendor/bin/codecept run tests/unit/Assertions/AssertionsTest.php:testFnDivision # run a single test

# test coverage

First you need xdebug to be installed and configured, then you need to either
add the XDEBUG_MODE=coverage environment variable set, Or xdebug.mode=coverage
in on of your php ini config files (mostly where you've configured xdebug)

export XDEBUG_MODE=coverage
./vendor/bin/codecept run tests/unit --coverage-html # coverage for a directory
./vendor/bin/codecept run tests/unit/Assertions/AssertionsTest.php --coverage-html # coverage for a filee
