<?php

namespace Tests\Unit\DataProviders;

trait FunctionsProviders
{
    /**
     * Data Provider for testFnIsLongName
     * @return void
     */
    public function getFnIsLongNameProvider()
    {
        $name = 'Cristiano';
        $long_length = 6;
        $strlen_value = 5;

        yield 'Case 1: When name is shorter' => [
            'args' => [
                'name' => $name,
                'long_length' => $long_length,
            ],
            'mock_return_values' => [
                'strlen' => $strlen_value,
            ],
            'mock_assertions' => [
                'called' => [
                    'strlen' => [
                        'params' => [$name],
                        'times' => 1,
                    ]
                ]
            ],
            'expected' => false,
        ];

        $strlen_value = 10;
        $name = 'Jonny';
        yield 'Case 2: When name is longer' => [
            'args' => [
                'name' => $name,
                'long_length' => $long_length,
            ],
            'mock_return_values' => [
                'strlen' => $strlen_value,
            ],
            'mock_assertions' => [
                'called' => [
                    'strlen' => [
                        'params' => [$name],
                        'times' => 1,
                    ]
                ]
            ],
            'expected' => true,
        ];
    }
}
