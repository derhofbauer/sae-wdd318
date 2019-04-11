<?php

$host = 'mariadb'; // bei MAMP/XAMPP/etc.: localhost
$user = 'shop';
$pass = 'password';
$dbname = 'shop';

$link = mysqli_connect($host, $user, $pass, $dbname);

// salted hashes: http://davismj.me/images/blog/2016-1-28-bcrypt-1.png

?>