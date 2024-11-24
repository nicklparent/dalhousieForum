<?php
    session_start();
    include_once "templates/header.php";
    if (isset($_SESSION['loggedIn']) && isset($_SESSION['userName'])) {
        echo "<h2>Welcome {$_SESSION['user']}</h2>";
    }
?>

<div class="d-flex flex-column align-items-center justify-content-center container bg-secondary" style="width: 70%" id="post-list">

</div>
<?php
    require "templates/footer.php";
?>