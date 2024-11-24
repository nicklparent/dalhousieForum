<?php
session_start();

require_once "db_connect.php";

$mydb = new DB();

$username = $_POST['userName'];
$password = $_POST['password'];
$passwordConfirm = $_POST["password-confirm"];

$created = false;

if ($username && $password && $password === $passwordConfirm) {
    $usercheck = $mydb->selectData("username", "users", "username = '{$username}'");
    if (isset($usercheck["Error"])) {
        if ($usercheck["Error"] === "No results found") {

        }
    } else {
        header("Location ../index.php?usernameTaken", true, 302);
    }
}
?>