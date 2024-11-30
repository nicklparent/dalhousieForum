<?php
// Messages functionality -- Required feature
session_start();
require "../includes/db_connect.php";
$mydb = new DB();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$senderId = $data['senderId'];
$id = $_SESSION["userID"];
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
?>