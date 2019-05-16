<?php require_once __DIR__ . '/../Partials/Header.php'; ?>
    <div class="container">

        <h1>Cart</h1>

        <?php foreach ($products as $product) : ?>
            <div class="product">
                <?php echo $_SESSION['cart'][$product->id]; ?>x <?php echo $product->name; ?> - Price: <?php echo $product->price; ?>, Subtotal: <?php echo $_SESSION['cart'][$product->id] * $product->price; ?>
            </div>
        <?php endforeach; ?>

        <div class="total-price">
            Gesamtpreis: <?php echo sprintf('%.2f ,-', $total); ?>
        </div>

    </div>
<?php require_once __DIR__ . '/../Partials/Footer.php'; ?>