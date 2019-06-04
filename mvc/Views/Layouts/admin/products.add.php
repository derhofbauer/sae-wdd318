<?php require_once __DIR__ . '/../../Partials/Admin/Header.php'; ?>

    <div class="container">
        <h1>Add Product</h1>
        <div class="row">

            <form action="admin/products/add" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="price">Preis</label>
                    <input type="number" name="price" id="price">
                </div>
                <div class="form-group">
                    <label for="stock">Lagerbestand</label>
                    <input type="number" name="stock" id="stock">
                </div>
                <div class="form-group">
                    <label for="description">Beschreibung</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="images">Bilder</label>
                    <input type="file" name="images[]" id="images" multiple>
                </div>
                <div class="form-group">
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>

<?php require_once __DIR__ . '/../../Partials/Footer.php'; ?>