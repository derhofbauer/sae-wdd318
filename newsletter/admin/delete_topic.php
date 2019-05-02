<?php

require_once '../autoloader.php';
require_once 'check_admin.php';

session_start();

$topic_id = $_GET['topic_id'];

// $stmt = mysqli_stmt_init($link);
// $sql = "DELETE FROM abos WHERE topic_id = ?";
// mysqli_stmt_prepare($stmt, $sql);
// mysqli_stmt_bind_param($stmt, "i", $topic_id);
// mysqli_stmt_execute($stmt);
$db->query("DELETE FROM abos WHERE topic_id = ?", [
    "i:id" => $topic_id
]);

// $sql = "DELETE FROM topics WHERE id = ?";
// mysqli_stmt_prepare($stmt, $sql);
// mysqli_stmt_bind_param($stmt, "i", $topic_id);
// mysqli_stmt_execute($stmt);
$db->query("DELETE FROM topics WHERE id = ?", [
    "i:id" => $topic_id
]);

// var_dump(mysqli_error($link));

header('Location: index.php');

?>