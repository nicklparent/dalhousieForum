<?php
// Messages functionality -- Required feature
session_start();
require_once "includes/db_connect.php";
require_once "includes/validate.php";

if (!isset($_SESSION["loggedIn"])) {
    header("Location: index.php", true, 302);
    die();
}

require_once "templates/header.php";
?>

<div class="user-list d-flex flex-column container show">

</div>

<div class="message-list d-flex flex-column container <?php echo isset($_GET['user']) ? 'show' : ' hide'; ?>">
    <p style="color: white">Hello World</p>
</div>

<?php
require_once "templates/footer.php";
?>
