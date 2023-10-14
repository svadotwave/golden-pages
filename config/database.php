<?php

function connetDB() :mysqli {

    $servername = "localhost";
    $username = "root";
    $password = "gobd1255";
    $dbname = "db_golden_pages";

    // Create connection
    $db = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_set_charset($db, 'utf8');

    // Check connection
    if (!$db) {
        die("ERROR " . mysqli_connect_error());
        exit;
    }

    return $db;
}