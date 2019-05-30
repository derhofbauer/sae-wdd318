<?php require_once __DIR__ . '/../../Partials/Admin/Header.php'; ?>

    <div class="container">
        <div class="row">
            <ul>
                <?php foreach ($products as $product): ?>
                <li>
                    <span class="product_id">
                        (<?php echo $product->id; ?>)
                    </span>
                    <a href="admin/products/edit/<?php echo $product->id; ?>">
                        <?php echo $product->name; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

<?php require_once __DIR__ . '/../../Partials/Footer.php'; ?>