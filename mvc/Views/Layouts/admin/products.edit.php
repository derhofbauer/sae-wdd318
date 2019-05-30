<?php require_once __DIR__ . '/../../Partials/Admin/Header.php'; ?>

    <div class="container">
        <h1>Edit: <?php echo $product->name; ?></h1>
        <div class="row">

            <form action="admin/products/update/<?php echo $product->id; ?>" method="post" enctype="multipart/form-data">
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
                    <input type="file" name="images[]" id="images" multiple>
                </div>
                <div class="form-group">
                    <?php foreach ($product->images as $image): ?>
                        <div class="thumbnail">
                            <img src="<?php echo $base . 'Assets/' . $image; ?>" width="150">
                            <label>
                                <?php
                                /**
                                 * Formularfeld-Namen im Format name[index] erzeigen im $_POST['name'] einen Array, also:
                                 *
                                 * $_POST['name'][index] = <formular-value>
                                 */
                                ?>
                                <input type="checkbox" name="delete[<?php echo $image; ?>]"> Löschen?
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