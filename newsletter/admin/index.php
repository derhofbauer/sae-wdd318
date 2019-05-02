<?php
    require_once '../autoloader.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
    <form action="login.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email" required>
        
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="password" required>

        <br>

        <input type="submit">
    </form>
    <?php else: ?>
        <p>logged in</p>
        // liste aller topics
        <?php
        // $stmt = mysqli_stmt_init($link);
        // $sql = "SELECT * FROM topics;";
        // mysqli_stmt_prepare($stmt, $sql);
        // mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt);
        $topics = $db->query('SELECT * FROM topics', []);

        foreach ($topics as $topic) {
            $currentTopic = new Topic($topic['id'], $topic['name']);

            $html = [];
            $html[] = '<ul>';
            $html[] = "<li>{$currentTopic->getName()} - ";
            $html[] = "<a href=\"edit_topic.php?topic_id={$currentTopic->getId()}\" />Edit</a>";
            $html[] = "<a href=\"delete_topic.php?topic_id={$currentTopic->getId()}\" />Delete</a>";
            $html[] = '</li>';
            $html[] = '</ul>';

            echo implode($html, '');

        }
        ?>
        <a href="new_topic.php">New Topic</a>
    <?php endif; ?>
</body>
</html>