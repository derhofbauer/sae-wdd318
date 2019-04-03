<?php
session_start();
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fancy menü</title>
</head>
<body>

<?php

$nav = [
    'http://google.com' => 'Google',
    'http://sae.edu' => 'SAE',
    'http://nasa.gov' => 'NASA'
];

?>

<ul>
    <?php
    foreach ($nav as $url => $label) {
        $redirect_url = "redirect.php?url=" . urlencode($url);

        if (
            isset($_SESSION['clicked'][$url]) &&
            $_SESSION['clicked'][$url] === true
        ) {
            $label .= ' - wurde bereits geklickt';
        }

        echo "<li>
            <a target=\"_blank\" href=\"$redirect_url\">
            $label
            </a>
        </li>";
    }
    ?>
</ul>

</body>
</html>