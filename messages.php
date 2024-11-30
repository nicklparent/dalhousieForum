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
<div class="show" id="user-display">
    <div class="user-list d-flex flex-column container">

    </div>
</div>

<div class="hide" id="message-display">
    <div class="message-list d-flex flex-column container" style="display: none;">
        <a class="btn btn-secondary" id="users-return"><p>Back To Users</p></a>
    </div>
</div>

<?php
require_once "templates/footer.php";
?>


<div class="message">
    <p class="message-content">${data}</p>
</div>