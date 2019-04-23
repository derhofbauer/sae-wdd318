<?php

require_once '../dbconnect.php';
require_once 'check_admin.php';

session_start();

$topic_id = $_GET['topic_id'];

$stmt = mysqli_stmt_init($link);
$sql = "DELETE FROM abos WHERE topic_id = ?";
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $topic_id);
mysqli_stmt_execute($stmt);

$sql = "DELETE FROM topics WHERE id = ?";
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $topic_id);
mysqli_stmt_execute($stmt);

// var_dump(mysqli_error($link));

require_once '../dbclose.php';

header('Location: index.php');

?>