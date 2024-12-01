<?php
// Messages functionality -- Required feature
session_start();
require "../includes/validate.php";
require "../includes/db_connect.php";
$mydb = new DB();
$validater = new validater();

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$type = $data['type'];
$id = $_SESSION["userID"];
if ($type === "read") {
    $senderId = $data['senderId'];
    $sql = "SELECT * FROM messages WHERE sender_id = {$senderId} ORDER BY timestamp DESC";
    $result = $mydb->getDbConn()->query($sql);
    if (!$result){
        echo json_encode(['error' => 'Database query failed']);
        exit;
    }
    $sendout = [];
    while ($row = $result->fetch_assoc()) {
        $sendout[] = $row;
    }
    echo json_encode($sendout);
} else if ($type === "write") {
    $senderId = $data['senderId'];
    $message = $data['content'];

    if (!$validater->validateMessage($message)) {
        echo json_encode(['error' => 'Invalid message']);
        exit;
    }
    $sql = "INSERT INTO messages (sender_id, receiver_id, content) VALUES ('{$senderId}', '{$id}', '{$message}')";
    $result = $mydb->insertData('messages', "'sender_id', 'receiver_id', 'content'", "'{$senderId}', '{$id}', '{$message}'");
    echo json_encode($result);
}
?>