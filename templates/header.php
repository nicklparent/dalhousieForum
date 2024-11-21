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
    <Link href="/assets/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!--
[Bootstrap header] https://getbootstrap.com/docs/5.3/examples/headers/
-->
<header class="py-3 mb-3 border-bottom">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <div class="d-flex">
            <a href="index.php" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <img class="bi me-2" width="40" height="32" src="assets/images/logo.png">
                <h4 class="text-bold">Dalhousie Forum</h4>
            </a>
        </div>

        <div class="d-flex align-items-center">
            <form class="w-100 me-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search" wfd-id="id2">
            </form>

            <div class="corner">
                <?php
                    if (isset($_SESSION['logged_in'])) {
                    ?>

                    <?php
                    }
                ?>
                ?>
            </div>
        </div>
    </div>
</header>
