<?php
if(!isset($_SESSION)){
  session_start();
}
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
//database connection
$mysqli= new mysqli("localhost","root", "root", "palsandpartner");
if (mysqli_connect_error()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
