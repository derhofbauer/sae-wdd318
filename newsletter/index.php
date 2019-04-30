<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter</title>
</head>
<body>
<?php 
require_once 'autoloader.php';
require_once 'subscribe.php';
?>

<h1>Newsletter</h1>

<?php if (isset($success) && $success === true): ?>
    <p class="success">Wohoo! neue Abos!</p>
<?php endif; ?>

<form action="index.php" method="post">
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email">
    </div>

    <div class="form-group">

        <?php
        // $stmt = mysqli_stmt_init($link);
        // $sql = "SELECT * FROM topics;";
        // mysqli_stmt_prepare($stmt, $sql);
        // mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt);

        $result = $db->query("SELECT * FROM topics;", []);

        foreach ($result as $row) {
            $topic = new Topic($row['id'], $row['name']);

            $html = [];
            $html[] = '<div>';
            $html[] = '<label>';
            $html[] = "<input type=\"checkbox\" name=\"topic-{$topic->getId()}\" value=\"{$topic->getId()}\"> {$topic->getName()}";
            $html[] = '</label>';
            $html[] = "<a href=\"subscribers.php?topic_id={$topic->getId()}\" />Show Subscribers</a>";
            $html[] = '</div>';

            echo implode($html, '');

        }
        ?>
    </div>

    <div class="form-group">
        <button class="btn btn-primary">Subscribe</button>
    </div>



</form>
</body>
</html>