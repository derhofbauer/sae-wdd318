<?php require_once __DIR__ . '/../Partials/Header.php'; ?>
    <div class="container">

        <h1><?php echo $product->name; ?></h1>
        
        <div class="image">
            <?php foreach ($product->images as $image): ?>
                <img src="<?php echo "$base/Assets/$image"; ?>" alt="<?php echo $product->name; ?>" width="200px">
            <?php endforeach; ?>
        </div>

        <div class="description">
            <?php echo $product->description; ?>
        </div>

        <div class="price">
            <?php echo sprintf('%.2f ,-', $product->price); ?>
        </div>

        <?php if ($product->stock <= 0): ?>
            <div class="out-of-stock">
                Dieses Produkt ist derzeit nicht lieferbar
            </div>
        <?php endif; ?>

        <a href="cart/add/<?php echo $product->id; ?>" class="btn btn-primary">Add To Cart</a>

    </div>
<?php require_once __DIR__ . '/../Partials/Footer.php'; ?>