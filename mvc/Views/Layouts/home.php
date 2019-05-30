<?php require_once __DIR__ . '/../Partials/Header.php'; ?>
<div class="container">
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="product col-3">
                <a href="products/show/<?php echo $product->id; ?>">
                    <?php echo $product->name; ?>
                </a>
                <div class="description">
                    <?php echo $product->description; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once __DIR__ . '/../Partials/Footer.php'; ?>