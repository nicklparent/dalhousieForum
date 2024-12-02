<?php
session_start();
if (!isset($_SESSION["loggedIn"])) {
    header("Location: index.php", true, 302);
    die();
}

include "templates/header.php";

include "templates/post_card.php";

include "templates/footer.php";
?>
