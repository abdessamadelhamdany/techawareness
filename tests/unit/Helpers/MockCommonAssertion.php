<?php

namespace Tests\Unit\Helpers;

class MockCommonAssertion
{

    /**
     * Takes a list of mock functions, and list of called, and not called functions
     * Example of $mock_assertions value
     * [
     *      'called' => [
     *          'fn_get_category_name' => ['params' => [], 'times' => 1], Also you can provide an array of metadata, for cases like `fn_set_hook`
     *          'fn_set_hook' => [['params' => [], 'times' => 1], ['params' => ['hook_name'], 'times' => 1]]
     *      ],
     *      'not_called' => [
     *          'fn_set_hook' => [[], ['hook_name']],
     *          'fn_get_pages' => [],
     *      ]
     * ]
     *
     * @param array $mock_functions Mock functions list
     * @param array $mock_assertions Mock assertions
     *
     * @return void
     */
    public static function doMyMockAssertions($mock_functions, $mock_assertions)
    {
        foreach ($mock_assertions['called'] ?? [] as $mock_func_name => $mock_func_metadata) {
            if (array_key_exists('params', $mock_func_metadata)) {
                static::assertMockFunctionWasCalled($mock_functions[$mock_func_name], $mock_func_metadata);
            } else {
                foreach ($mock_func_metadata as $metadata) {
                    static::assertMockFunctionWasCalled($mock_functions[$mock_func_name], $metadata);
                }
            }
        }

        foreach ($mock_assertions['not_called'] ?? [] as $mock_func_name => $mock_func_params) {
            if (count($mock_func_params) === 0) {
                $mock_functions[$mock_func_name]->wasNotCalled();
            } else {
                $has_multiple_params = count(array_filter($mock_func_params, fn ($mock_func_param) => !is_array($mock_func_param))) === 0;
                foreach ($has_multiple_params ? $mock_func_params : [$mock_func_params] as $called_with_params) {
                    $mock_functions[$mock_func_name]->wasNotCalledWith($called_with_params);
                }
            }
        }
    }

    /**
     * Assert a single mock function call
     *
     * @param object $mock_function      The function for assertion
     * @param array  $mock_func_metadata Metadata to use on assertion
     *
     * @return void
     */
    private static function assertMockFunctionWasCalled($mock_function, $mock_func_metadata)
    {
        if ($mock_func_metadata['times'] === 1) {
            if (count($mock_func_metadata['params']) === 0) {
                $mock_function->wasCalledOnce();
            } else {
                $mock_function->wasCalledWithOnce($mock_func_metadata['params']);
            }
        } elseif ($mock_func_metadata['times'] > 1) {
            if (count($mock_func_metadata['params']) === 0) {
                $mock_function->wasCalledTimes($mock_func_metadata['times']);
            } else {
                $mock_function->wasCalledWithTimes($mock_func_metadata['params'], $mock_func_metadata['times']);
            }
        }
    }
}
