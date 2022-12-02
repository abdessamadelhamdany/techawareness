<?php

namespace Tests\Unit\DataProviders;

trait ClassesProviders
{
    /**
     * Data Provider for testCalculate
     * @return void
     */
    public function getCalculateProvider()
    {
        yield 'Case 1: It should add two numbers' => [
            'args' => [
                'x' => 1,
                'y' => 2,
                'op' => '+',
            ],
            'mock_manual_assertions' => ['divide' => false],
            'expected' => 3,
        ];

        yield 'Case 2: It should substract two numbers' => [
            'args' => [
                'x' => 4,
                'y' => 2,
                'op' => '-',
            ],
            'mock_manual_assertions' => ['divide' => false],
            'expected' => 2,
        ];

        yield 'Case 3: It should multiply two numbers' => [
            'args' => [
                'x' => 4,
                'y' => 2,
                'op' => 'x',
            ],
            'mock_manual_assertions' => ['divide' => false],
            'expected' => 8,
        ];

        yield 'Case 4: It should return zero on unsupported operator' => [
            'args' => [
                'x' => 4,
                'y' => 2,
                'op' => '%',
            ],
            'mock_manual_assertions' => ['divide' => false],
            'expected' => 0,
        ];

        yield 'Case 5: It should throw an error when devided by zero' => [
            'args' => [
                'x' => 4,
                'y' => 0,
                'op' => '/',
            ],
            'mock_manual_assertions' => ['divide' => [
                'with' => [4, 0],
                'return' => function () {
                    throw new \Exception('Operation denied');
                }
            ]],
            'expected' => 0,
        ];

        yield 'Case 6: It should devide two numbers' => [
            'args' => [
                'x' => 32,
                'y' => 8,
                'op' => '/',
            ],
            'mock_manual_assertions' => ['divide' => [
                'with' => [32, 8],
                'return' => 4
            ]],
            'expected' => 4,
        ];
    }
}
