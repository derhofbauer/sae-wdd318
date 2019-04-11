<?php

require_once 'dbconnect.php';

?>


<div class="user-list">
    <header>Users</header>
    <ul class="users">
        <?php
            $sql = "SELECT id,name FROM users;";

            $result = mysqli_query($link, $sql);
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li class=\"id-{$row['id']}\">{$row['name']}</li>";
            }
        ?>
    </ul>
</div>


<?php

require_once 'dbclose.php';

?>