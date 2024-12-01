<?php

//redirect if alreadt logged in
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
    header("location: ../index.php", true, 302);
    die();
}
function cleanData($string){
    $string = htmlspecialchars($string);
    $string = trim($string);
    $string = stripslashes($string);
    return $string;
}
session_start();
require_once "validate.php";
require_once "db_connect.php";

//Constants
$regPassword = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!\-@#$%^&*_{}+\\\;:.,\[\]()~`]).{8,}$/";
$regUsername = "/^[a-zA-Z0-9]+$/";

$mydb = new DB();
$validater = new validater();

$username = cleanData($_POST['userName']);
$password = cleanData($_POST['password']);
$passwordConfirm = cleanData($_POST["password-confirm"]);

if (!($validater->validateUsername($username) || $validater->validatePassword($password) || $validater->validatePassword($passwordConfirm))) {
    header("Location: ../index.php?invalidPasssword", true, 302);
    exit;
}

$created = false;

if ($username && $password) {

    $usercheck = $mydb->selectData("username, id", "users", "username = '{$username}'");
    $usercheck = json_decode($usercheck, true);
    if (isset($usercheck["Error"])) {
        if ($usercheck["Error"] === "No results found") {
            if ($password === $passwordConfirm) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $insert = $mydb->getDbConn()->query("INSERT INTO users (username, password) VALUES ('{$username}', '$hashedPassword')");
                $_SESSION['loggedIn'] = true;
                $_SESSION["userName"] = $username;
                $_SESSION["userID"] = $usercheck["id"];
                $created = true;
            } else {
                header("Location: ../index.php?invalidPassword", true, 302);
                die();
            }
        } else {
            header("Location ../index.php?usernameTaken", true, 302);
            die();
        }
    }
}

if (!$created) {
    header("Location: ../index.php?loginerror", true, 302);
    die();
} else {
    header("Location: ../index.php?loginsuccess", true, 302);
}
?>