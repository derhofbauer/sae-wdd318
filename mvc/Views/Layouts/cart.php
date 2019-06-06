<?php require_once __DIR__ . '/../Partials/Header.php'; ?>
    <div class="container">

        <h1>Cart</h1>

        <?php if (empty($products)): ?>
            <p class="has-danger">Oh noooo :( Warenkorb leer!</p>
        <?php endif; ?>

        <?php foreach ($products as $product) : ?>
            <div class="product">
                <?php echo $_SESSION['cart'][$product->id]; ?>x <?php echo $product->name; ?> -
                                                              Price: <?php echo $product->price; ?>,
                                                              Subtotal: <?php echo $_SESSION['cart'][$product->id] * $product->price; ?>
                <span> - </span>
                <a href="cart/remove/<?php echo $product->id; ?>">Remove from Cart</a>
            </div>
        <?php endforeach; ?>

        <div class="total-price">
            Gesamtpreis: <?php echo sprintf('%.2f ,-', $total); ?>
        </div>

        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
            <a href="checkout/address" class="btn btn-primary">Kaufen!</a>
        <?php else: ?>
            <a href="login" class="btn btn-primary">Bitten einloggen zum Kaufen</a>
        <?php endif; ?>

    </div>
<?php require_once __DIR__ . '/../Partials/Footer.php'; ?>