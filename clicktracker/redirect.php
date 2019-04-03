<?php

$url = urldecode($_GET['url']);

session_start();

$_SESSION['clicked'][$url] = true;

header("Location: $url");

?>