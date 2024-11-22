<?php
include "../includes/db_connect.php";
$mydb = new DB();

$posts = $mydb->selectData("*", "posts");

header('Content-type: application/json');
echo json_encode($posts);
?>
