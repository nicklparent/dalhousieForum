<?php
include "../includes/db_connect.php";
$mydb = new DB();

$results = $mydb->selectData("*", "posts");
while ($row = mysqli_fetch_assoc($results)) {
    echo json_encode($row);
}
?>
