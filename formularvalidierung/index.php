<?php
require_once 'validator.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formularvalidierung</title>
</head>
<body>
    <?php

    if (empty($errors) && empty($_POST)) {
        // Formular wurde nicht abgeschickt und wird initial aufgerufen
        require_once 'form.php';
    } elseif (!empty($errors)) {
        // Formular wurde abgeschickt, aber es gibt Fehler
        require_once 'form.php';
    } else {
        // Formular wurde abgeschickt, und alles passt
        require_once 'thankyou.php';
    }

    ?>
</body>
</html>