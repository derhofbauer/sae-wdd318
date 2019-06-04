<?php require_once __DIR__ . '/../../Partials/Admin/Header.php'; ?>

    <div class="container">
        <a href="admin/products/add">Add New Product</a>
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
                    <span> - </span>
                    <a href="admin/products/delete/<?php echo $product->id; ?>">Delete</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

<?php require_once __DIR__ . '/../../Partials/Footer.php'; ?>