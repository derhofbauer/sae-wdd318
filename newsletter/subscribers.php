<?php

require_once 'dbconnect.php';

$topic_id = $_GET['topic_id'];


// Topic Namen abfragen
$stmt = mysqli_stmt_init($link);
$sql = "SELECT * FROM topics WHERE id = ?";
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $topic_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);
$topic_name = mysqli_fetch_all($result, MYSQLI_ASSOC)[0]['name'];

echo "<h1>Topic: $topic_name</h1>";

// abonenten abfragen
$stmt = mysqli_stmt_init($link);
$sql = "SELECT users.id, users.email FROM users JOIN abos ON
    user_id = users.id
    WHERE abos.topic_id = ?";
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $topic_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>{$row['email']}</div>";
}

require_once 'dbclose.php';

?>