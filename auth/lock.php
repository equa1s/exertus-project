<?php

include '../cfg/config.php';

session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($conn, "SELECT * FROM accounts WHERE login='".$user_check."'");

$row = mysqli_fetch_assoc($ses_sql);

$login_session = $row['login'];

if(!isset($login_session)) {
    header("Location: ../auth/login.php");
    exit();
}

