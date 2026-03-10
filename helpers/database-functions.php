<?php

/**
 * function for create mysql insert query
 */

function db_insert(string $table, array $data)
{
    // generate columns
    $sql_columns = implode(', ', array_keys($data));

    //generate values
    $vals = array_values($data);

    $sql_vals = [];
    foreach ($vals as $val) {
        if ($val === NULL) {
            $val = 'NULL';
        }
        $sql_vals[] = "'$val'";
    }

    $sql_values = implode(', ', $sql_vals);

    // create query

    $sql = "INSERT INTO $table ($sql_columns) VALUES ($sql_values)";
    print_r($sql);
}

// Test
db_insert('users',[
    'name' => 'Ehsan',
    'family' => 'Didbabn',
    'age' => 32,
    'job' => 'Programmer'
]);