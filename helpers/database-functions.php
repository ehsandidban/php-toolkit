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
            $sql_vals[] = "NULL";
            continue;
        }
        $sql_vals[] = "'$val'";
    }

    $sql_values = implode(', ', $sql_vals);

    // generate query

    $sql = "INSERT INTO $table ($sql_columns) VALUES ($sql_values)";
    print_r($sql);
}

/**
 * function for create mysql update query
 */
function db_update($table, $data, $where)
{
    // generate SET of query
    $set_sql = '';
    foreach ($data as $key => $value) {
        if ($value === NULL) {
            $set_sql .= "$key = NULL, ";
            continue;
        }
        $set_sql .= "$key = '$value', ";
    }
    $set_sql = trim($set_sql, ', ');

    // generate WHERE of query
    if (is_array($where)) {
        $where_sql = '';
        foreach ($where as $key => $value) {
            if ($value === NULL) {
                $where_sql .= "$key IS NULL AND ";
                continue;
            }
            $where_sql .= "$key = '$value' AND ";
        }
        $where_sql = trim($where_sql, 'AND ');
    } else {
        $where_sql = $where;
    }

    // generate query
    $sql = "UPDATE $table SET $set_sql WHERE $where_sql";
    print_r($sql);
}

function db_delete($table, $where)
{
    // generate WHERE of query
    if (is_array($where)) {
        $where_sql = '';
        foreach ($where as $key => $value) {
            if ($value === NULL) {
                $where_sql .= "IS NULL AND ";
                continue;
            }
            $where_sql .= "$key = '$value' AND ";
        }
        $where_sql = trim($where_sql, 'AND ');
    } else {
        $where_sql = $where;
    }

    // generate query
    $sql = "DELETE FROM $table WHERE $where_sql";
    print_r($sql);

}
// Test
// db_insert('users',[
//     'name' => 'Ehsan',
//     'family' => 'Didbabn',
//     'age' => 32,
//     'job' => null
// ]);

// db_update('users', [
//     'name' => 'x',
//     'family' => 'y',
//     'phone' => null
// ], [
//     'uid' => null,
//     'phone' => null
// ]);

// db_delete('tests',"name = 'Ehsan' OR family = 'Didban'");