<?php

if (isset($_POST['do-submit'])) {
    var_dump($_POST);
}

?>

<form action="index.php?page=contact" method="post">
    <input type="text" name="name"> <br>
    <input type="submit" name="do-submit">
</form>