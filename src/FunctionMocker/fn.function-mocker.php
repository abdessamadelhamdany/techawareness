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
        var_dump($message);
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
