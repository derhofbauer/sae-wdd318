<?php

require_once 'dbconnect.php';

?>


<!-- Aufgabe 1: alle Produkte aus der Datenbank auslesen und ähnlich wie das hier
    ausgeben -->
<div class="products">
    <div class="product product-1">
        <img src="product_images/image1.jpg" alt="Product Title">
        <div class="title">Product Title</div>
        <div class="price">9.99 €</div>
    </div>
    <div class="product product-2">
        <img src="product_images/image2.jpg" alt="Product Title">
        <div class="title">Product Title</div>
        <div class="price">9.99 €</div>
    </div>
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