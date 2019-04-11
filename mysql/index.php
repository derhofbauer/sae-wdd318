<?php

require_once 'dbconnect.php';

?>


<!-- Aufgabe 1: alle Produkte aus der Datenbank auslesen und ähnlich wie das hier
    ausgeben -->
<div class="products">
    <?php

        $sql = "SELECT id,name,images,price FROM products WHERE images != '';";

        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_assoc($result)): ?>


            <div class="product product-<?php echo $row['id']; ?>">
                <img src="<?php echo $row['images']; ?>" alt="<?php echo $row['name']; ?>" style="max-width: 100px;">
                <div class="title"><?php echo $row['name']; ?></div>
                <div class="price"><?php echo $row['price']; ?> €</div>
            </div>
    
    <?php endwhile; ?>
</div>





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