<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php (isset($htmltitle) ? $htmltitle : '') ?></title>
    <base href="<?php echo $base; ?>">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $base; ?>Assets/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo $base; ?>">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products">Products</a>
            </li>
            <li class="nav-item">
                <a href="cart" class="nav-link">Cart (<?php echo \App\Controllers\CartController::cartCount(); ?>)</a>
            </li>
            <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup">Registrieren</a>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="admin">Admin</a>
                </li>
            <?php endif; ?>
        </ul>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
            <div class="logged_in">
                Hallo, <?php echo \App\Controllers\LoginController::getEmailFromSession(); ?>
                (<a href="<?php echo $base; ?>logout">Logout</a>)
            </div>
        <?php endif; ?>
    </div>
</nav>
<main>