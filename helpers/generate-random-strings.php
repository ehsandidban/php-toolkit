<?php

function string_generator(
    int $length = 10,
    bool $numbers = true,
    bool $lowercase = true,
    bool $uppercase = true,
    bool $special_chars = true,
    int $number_of_strings = 5
) {
    $characters = '';
    if ($numbers)
        $characters .= '1234567890';
    if ($lowercase)
        $characters .= 'abcdefghijklmnopqrstuvwxyz';
    if ($uppercase)
        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if ($special_chars)
        $characters .= '~!@#$%^&*()_-+=';

    $result = [];
    for ($i = 0; $i < $number_of_strings; $i++) {
        $string = '';
        while (strlen($string) < $length) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        $result[$i] = $string;
    }
    return $result;
}

print_r(string_generator(30, number_of_strings: 100));