<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter</title>
</head>
<body>
<?php require_once 'dbconnect.php'; ?>

<h1>Newsletter</h1>

<form action="index.php" method="post">
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email">
    </div>

    <div class="form-group">

        <?php
        $sql = "SELECT * FROM topics;";
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

            $html = [];
            $html[] = '<div>';
            $html[] = '<label>';
            $html[] = "<input type=\"checkbox\" name=\"topic-{$row['id']}\" value=\"{$row['id']}\"> {$row['name']}";
            $html[] = '</label>';
            $html[] = '</div>';

            echo implode($html, '');

        }
        ?>
    </div>

    <div class="form-group">
        <button class="btn btn-primary">Subscribe</button>
    </div>

</form>
    
<?php require_once 'dbclose.php'; ?>
</body>
</html>