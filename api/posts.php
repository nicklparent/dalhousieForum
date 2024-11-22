<?php
include "../includes/db_connect.php";
$mydb = new DB();

$posts = $mydb->selectData("*", "posts INNER JOIN users ON posts.user_id = users.id");

header('Content-type: application/json');
echo json_encode($posts);
?>