<?php
// Messages functionality -- Required feature
session_start();
require "../includes/db_connect.php";
$mydb = new DB();
header('Content-Type: application/json');

$sql = "SELECT u.*, m.content, MAX(m.timestamp) as last_message 
        FROM users u
        LEFT JOIN messages m ON u.id = m.sender_id 
        GROUP BY u.id
        ORDER BY last_message DESC";
$result = $mydb->getDbConn()->query($sql);

$sendout = [];
while ($row = $result->fetch_assoc()) {
    $sendout[] = $row;
}
echo json_encode($sendout);

?>
