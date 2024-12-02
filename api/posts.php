<?php
session_start();
require "../includes/validate.php";
require "../includes/db_connect.php";
$mydb = new DB();
$validater = new validater();

$data = json_decode(file_get_contents("php://input"), true);
header('Content-Type: application/json');

if ($data["type"] === "read"){
    $posts = $mydb->selectData("*", "posts INNER JOIN users ON posts.user_id = users.id", null, "created_at DESC");
    echo json_encode($posts);
    die();
} else if ($data["type"] === "write"){
    $title = $data["title"];
    $content = $data["content"];
    $user_id = $_SESSION["userID"];

    if (!$validater->validateMessage($title) || !$validater->validateMessage($content)){
        echo json_encode(["Error" => "Unauthorized request."]);
        die();
    }

    $sql = "INSERT INTO posts (user_id, title, content) VALUES ('$user_id', '$title', '$content')";
    $result = $mydb->getDbConn()->query($sql);

    if ($result){
        echo json_encode(["Success" => "Post created."]);
    } else {
        echo json_encode(["Error" => "Error creating post."]);
    }
} else {
    echo json_encode(["Error" => "Unauthorized request."]);
}

?>