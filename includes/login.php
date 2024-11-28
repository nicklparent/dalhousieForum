<?php
// Login functionality
session_start();

require_once "db_connect.php";

$mydb = new DB();

$userName = $_POST['userName'];
$password = $_POST['password'];

$loggedIn = false;

if ($userName && $password) {

    $result = $mydb->selectData("id, username, password", "users", "username = '{$userName}'");
    if ($result && isset($result[0]["password"])) {
        if (password_verify($password, $result[0]["password"])) {
            echo "here";
            $_SESSION["loggedIn"] = true;
            $_SESSION["userName"] = $result->password;
            $_SESSION["userID"] = $result[0]["id"];

            $loggedIn = true;
            header("location: ../index.php", true, 302);
        } else {
            header("location: ../index.php?invalidPassword", true, 302);
        }
        die();
    }
}

if (!$loggedIn) {
    header("Location: ../index.php?loginerror", true, 302);
    die();
}
?>