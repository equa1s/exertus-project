<?php

// localhost database
$dbConnection = array(
    "host" => "localhost",
    "username" => "root",
    "password" => "pswd",
    "database" => "l2ex_db"
);

// remote database

/*$dbConnection = array(
    "host" => "mysql.hostinger.com.ua",
    "username" => "u176661300_root",
    "password" => "L73RTwBEPl",
    "database" => "u176661300_l2ex"
);*/


// Create connection
$conn = mysqli_connect($dbConnection['host'],$dbConnection['username'],$dbConnection['password'],$dbConnection['database']);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
