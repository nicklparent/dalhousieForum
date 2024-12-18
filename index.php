<?php
    session_start();
    include_once "templates/header.php";
    ?>
<div class="bg-secondary d-flex justify-content-center align-items-center flex-column container" style="width: 70%;">

    <?php
    if (isset($_SESSION['loggedIn']) && isset($_SESSION['userName'])) {
        echo "<h2 class='text-center welcome'>Welcome<p class='welcome-name'>{$_SESSION['userName']}</p></h2>";
    }

    if (isset($_SESSION['loggedIn'])) {
        include_once "templates/post_card.php";
    }
    ?>

    <div class="d-flex flex-column align-items-center justify-content-center container" id="post-list">

    </div>
</div>
<?php
    require "templates/footer.php";
?>
