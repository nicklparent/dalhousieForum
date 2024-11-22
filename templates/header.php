<?php
// Header functionality
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dalhousie Forum</title>
    <Link href="assets/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!--
[Bootstrap header] https://getbootstrap.com/docs/5.3/examples/headers/
-->
<header class="py-3 border-bottom pg-header bg-gradient">
    <div class="container-fluid d-flex align-items-center justify-content-between" style="grid-template-columns: 1fr 2fr;">
        <div class="d-flex">
            <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <img class="bi me-2" width="45" height="45" src="assets/images/logo.png">
                <h4 class="text-bold">Dalhousie Forum</h4>
            </a>
        </div>

        <div class="d-flex align-items-center">
            <form class="ms-5" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search" style="background: rgba(134,124,118,0.4)">
            </form>
        </div>
            <?php
                // change to ! not logged in after sign in is done
                if (isset($_SESSION['logged_in'])) {
                ?>
                    <!-- Signed out view -->
                <?php
                } else {
                ?>
                <div class="corner">
                    <div class="navbar">
                        <div class="container">
                            <a class="navbar-brand fs-xs btn bg-dark-subtle m-1" href="index.php">Home</a>
                            <a class="navbar-brand fs-xs btn bg-dark-subtle m-1" href="new-post.php">New Post</a>
                            <a class="navbar-brand fs-xs btn bg-dark-subtle m-1" href="messages.php">Messages</a>
                        </div>
                    </div>
                <?php
                }
            ?>
        </div>
    </div>
</header>
<main class="d-flex justify-content-center border container" style="width: 70%">