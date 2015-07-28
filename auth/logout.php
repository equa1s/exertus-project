<?php
/**
 * Created by PhpStorm.
 * User: elia
 * Date: 22.07.15
 * Time: 13:56
 */
session_start();
if(session_destroy()) {
    header("Location: ../index.php");
}