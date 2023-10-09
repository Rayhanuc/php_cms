<?php

//Database information
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "mysql";
$db['db_name'] = "php_cms";

foreach($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connections) {
    echo "We are connected";
} else {
    echo "<pre>Database is not connected</pre>";
}