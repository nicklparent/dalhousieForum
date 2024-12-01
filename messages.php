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
<div class="show container" id="user-display">
    <h2 class="text-center">My Messages</h2>
    <div class="user-list d-flex flex-column container">

    </div>
</div>

<div class="hide flex-1" id="message-display">
    <div class="d-flex flex-column">
        <div class="message-list d-flex flex-column container flex-1" style="display: none;">

        </div>

        <div class="flex-1 form-floating container">
            <textarea class="form-control" name="message-in" id="message-in" placeholder="Enter your message"></textarea>
            <button class="btn btn-primary" id="message-submit">Send Message</button>
        </div>
        
    </div>
</div>

<?php
require_once "templates/footer.php";
?>

