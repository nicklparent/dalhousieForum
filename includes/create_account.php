<?php
session_start();

require_once "db_connect.php";

$mydb = new DB();

$username = $_POST['username'];
$password = $_POST['password'];
?>