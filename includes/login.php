<?php
// Login functionality
session_start();

require_once "db_connect.php";

$mydb = new DB();

$userName = $_POST['userName'];
$password = $_POST['password'];

$loggedIn = false;

if ($userName && $password) {

    $result = $mydb->selectData("*", "users", "username = {$userName}");
    if (!isset($result["Error"])) {
        if (password_verify($password, $result["Password"])) {
            $_SESSION["loggedIn"] = true;
            $_SESSION["userName"] = $result["Username"];

            $loggedIn = true;
            header("location: ../index.php", true, 302);
            die();
        }
    }
}

if (!$loggedIn) {
    header("Location: ../index.php?loginerror", true, 302);
    die();
}
?>