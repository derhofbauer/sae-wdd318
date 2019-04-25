<?php
require_once '../dbconnect.php';
require_once 'check_admin.php';

// wenn topic-formular abgeschickt --> speichern & redirect in Topic-Übersicht /admin/index.php
if (isset($_POST['topic'])) {
    $topic = trim($_POST['topic']);
    if (strlen($topic) >= 1) {
        $stmt = mysqli_stmt_init($link);
        $sql = "INSERT INTO topics (name) VALUES (?)";
        // $sql = "INSERT INTO topics SET name = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $topic);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header('Location: index.php');
    }
}


// sonst: formular anzeigen
?>

<h1>New Topic</h1>

<form action="" method="post">
    <label for="topic">Topic Name</label>
    <input type="text" name="topic" id="topic" placeholder="Topic Name" required>

    <br>

    <input type="submit">
</form>