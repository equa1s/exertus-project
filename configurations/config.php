<?php

// localhost database
$dbConnection = array(
    "host" => "localhost",
    "username" => "root",
    "password" => "pswd",
    "database" => "l2ex_db"
);

// Create connection
$conn = mysqli_connect($dbConnection['host'],$dbConnection['username'],$dbConnection['password'],$dbConnection['database']);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

