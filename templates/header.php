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
    <link rel="icon" href="assets/images/logo.png" type="image/x-icon">
</head>
<body class="bg-dark">

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
                if (!isset($_SESSION['logged_in'])) {
                ?>
                        <div class="d-flex gap-3">
                            <a id="login-link" href="" class="btn btn-primary">Login</a>
                            <!-- No text Wrap
                            [No text wrap] (https://www.w3schools.com/cssref/css3_pr_text-overflow.php)
                            -->
                            <div  id ="create-account-link" style="text-overflow: ellipsis; white-space: nowrap">
                                <a href="" class="btn btn-secondary btn-primary" style="max-height: 38px;"><p>Create Account </p></a>
                            </div>
                        </div>
                <?php
                } else {
                ?>
                <div class="corner">
                    <div class="navbar">
                        <div class="container">
                            <a class="navbar-brand fs-xs btn bg-dark-subtle m-1" href="index.php">Home</a>
                            <a class="navbar-brand fs-xs btn bg-dark-subtle m-1" href="new-post.php">New Post</a>
                            <a class="navbar-brand fs-xs btn bg-dark-subtle m-1" href="messages.php">Messages</a>
                            <a class="navbar-brand fs-xs btn btn-primary bg-dark-subtle m-1" href="includes/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
                <?php
                }
            ?>
    </div>
</header>
<!--Heavily inspired by the login appearence of november 21st in class work
[November 21st In lecture Activity] https://dal.brightspace.com/d2l/le/content/342736/viewContent/4598210/View
-->
<aside id="login-container" class="login-container <?php echo isset($_GET['loginerror']) ? 'show' :'hide';?>">
    <form action="includes/login.php" method="post">
        <input placeholder="Username" name="userName" id="userName-input" type="text">
        <input placeholder="Password" name="password" id="password-input" type="password">
        <input type="submit" id="login-btn">
        <?php
            if (isset($_GET['invalidPassword'])) echo "<p class='error'>Invalid Password</p>";
            if (isset($_GET['loginerror'])) echo "<p class='error'>Login Failed</p>";
        ?>
    </form>
</aside>

<!--Create Account Aside-->
<aside id="create-account-container" class="login-container hide">
    <form action="includes/create_account.php" method="post">
        <input placeholder="Username" name="userName" id="userName-create-input" type="text">
        <input placeholder="Password" name="password" id="password-create-input" type="password">
        <input placeholder=" Confirm Password" name="password-confirm" id="password-confirm-input" type="password">
        <input type="submit" id="create-Account-btn">
        <?php
        if (isset($_GET['invalidPassword'])) echo "<p class='error'>Invalid Password</p>";
        if (isset($_GET['usernameTaken'])) echo "<p class='error'>Username Taken</p>";
        ?>
    </form>
</aside>
<main>
