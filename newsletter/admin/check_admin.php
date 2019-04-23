<?php

session_start();

if (
    !isset($_SESSION['logged_in']) ||
    $_SESSION['logged_in'] !== true ||
    !isset($_SESSION['user_id']) ||
    !is_int($_SESSION['user_id'])
) {
   // wir sind nicht eingeloggt und mögen das nachholen
    header('Location: index.php');    
}

?>