<?php

define('LANG', 'en');

function fn_is_long_name(string $name, int $long_length): bool
{
    if (strlen($name) > $long_length) {
        return true;
    }
    return false;
}

function fn_print_message(string ...$messages): void
{
    foreach ($messages as $message) {
        echo $message;
    }
}

function fn_greeting(string $name, $lang = LANG): void
{
    switch ($lang) {
        case 'en':
            fn_print_message('Hello, ', $name);
            break;
        case 'fr':
            fn_print_message('Salut, ', $name);
            break;
        default:
            fn_print_message('No greeting to you sir!');
    }
}

/**
 * External function, and we trust it to works as expected
 */
function db_get_row(string $sql): array
{
    return [
        'select id, name, age from ?:users where id=3' => ['id' => 3, 'name' => 'John', 'age' => 23],
        'select id, name, age from ?:users where id=8' => ['id' => 8, 'name' => 'Tony', 'age' => 42],
    ][$sql];
}
