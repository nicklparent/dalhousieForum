<?php
// Footer functionality
?>

</main>
<footer class="d-flex flex-wrap justify-content-between align-items-center p-2 border-top bg-gradient pg-footer">
    <p>&copy; Dalhousie Forum 2024</p>
    <img class="bi me-2" width="45" height="45" src="assets/images/logo.png">
    <?php
        if (isset($_SESSION['loggedIn'])) {
            ?>
            <div class="corner">
                <div class="navbar">
                    <div class="container">
                        <a class="navbar-brand fs-xs btn bg-dark-subtle m-1" href="index.php">Home</a>
                        <a class="navbar-brand fs-xs btn bg-dark-subtle m-1" href="new-post.php">New Post</a>
                        <a class="navbar-brand fs-xs btn bg-dark-subtle m-1" href="messages.php">Messages</a>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>

            <?php
        }
    ?>
</footer>
<script src="assets/scripts.js"></script>
</body>
</html>