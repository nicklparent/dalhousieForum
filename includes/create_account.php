<?php
function cleanData($string){
    $string = htmlspecialchars($string);
    $string = trim($string);
    $string = stripslashes($string);
    return $string;
}
session_start();

require_once "db_connect.php";

$mydb = new DB();

$username = cleanData($_POST['userName']);
$password = cleanData($_POST['password']);
$passwordConfirm = cleanData($_POST["password-confirm"]);

$created = false;

if ($username && $password) {
    $usercheck = $mydb->selectData("username", "users", "username = '{$username}'");
    $usercheck = json_decode($usercheck, true);
    if (isset($usercheck["Error"])) {
        if ($usercheck["Error"] === "No results found") {
            if ($password === $passwordConfirm) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $insert = $mydb->getDbConn()->query("INSERT INTO users (username, password) VALUES ('{$username}', '$hashedPassword')");
                $_SESSION['loggedIn'] = true;
                $_SESSION["userName"] = $username;
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