<?php
// Messages functionality -- Required feature
session_start();
require "../includes/db_connect.php";
$mydb = new DB();

header('Content-Type: application/json');
$id = $_SESSION["userID"];
$sql = "SELECT sender_id FROM messages WHERE receiver_id = {$id} ORDER BY timestamp DESC";
$result = $mydb->getDbConn()->query($sql);

$sendout = [];
while ($row = $result->fetch_assoc()) {
    $sendout[] = $row["sender_id"];
}
echo json_encode($sendout);

?>