<?php require 'header.php'; ?>
    <main class="content container">
        <?php

        $default = 'content/home.php';

        if ($_GET['page'] === 'home') {
            include 'content/home.php';
        } elseif ($_GET['page'] === 'contact') {
            include 'content/contact.php';
        } else {
            include $default;
        }

        ?>
    </main>
<?php require 'footer.php'; ?>