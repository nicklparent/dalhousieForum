<?php
// Messages functionality -- Required feature
session_start();
require_once "includes/db_connect.php";
require_once "includes/validate.php";

if (isset($_SESSION["loggedIn"])) {
    header("Location: index.php", true, 302);
    die();
}

require_once "templates/header.php";
?>



<?php
require_once "templates/footer.php";
?>
