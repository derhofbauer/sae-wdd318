<?php

spl_autoload_register(function ($className) {
    require_once "./Classes/{$className}.php";
});


$host = 'mariadb'; // bei MAMP/XAMPP/etc.: localhost
$user = 'newsletter';
$pass = 'password';
$dbname = 'newsletter';
$db = new DB($host, $user, $pass, $dbname);

?>