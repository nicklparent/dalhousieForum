<?php
// Messages functionality -- Required feature
session_start();
require_once "includes/db_connect.php";

if (isset($_SESSION["loggedIn"])) {
    header("Location: index.php", true, 302);
    die();
}


?>