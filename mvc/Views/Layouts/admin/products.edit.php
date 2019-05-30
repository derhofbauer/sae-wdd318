<?php require_once __DIR__ . '/../../Partials/Admin/Header.php'; ?>

    <div class="container">
        <h1>Edit: <?php echo $product->name; ?></h1>
        <div class="row">

            <form action="admin/products/update/<?php echo $product->id; ?>" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="<?php echo $product->name; ?>" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="price">Preis</label>
                    <input type="number" value="<?php echo $product->price; ?>" name="price" id="price">
                </div>
                <div class="form-group">
                    <label for="stock">Lagerbestand</label>
                    <input type="number" value="<?php echo $product->stock; ?>" name="stock" id="stock">
                </div>
                <div class="form-group">
                    <label for="description">Beschreibung</label>
                    <textarea name="description" id="description"><?php echo $product->description; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="images">Bilder</label>
                    <input type="file" name="images" id="images">
                </div>
                <div class="form-group">
                    <?php foreach ($product->images as $image): ?>
                        <div class="thumbnail">
                            <img src="<?php echo $image; ?>" width="150">
                            <label>
                                <input type="checkbox" name="delete[<?= $image; ?>]"> Löschen?
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="form-group">
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>

<?php require_once __DIR__ . '/../../Partials/Footer.php'; ?>