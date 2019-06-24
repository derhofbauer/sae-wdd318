<?php

namespace App\Controllers;

class ProductController {

    public function show ($id) {
        $id = (int)$id;

        $product = \App\Models\Product::find($id);

        $params = [
            'product' => $product
        ];

        \App\Util\View::load('product.detail', $params);
    }

    public function list () {
        $controller = new HomeController();
        $controller->index();
    }

    public function adminList () {
        $products = \App\Models\Product::all();

        $params = [
            'products' => $products
        ];

        \App\Util\View::load('admin/products.list', $params);
    }

    public function editForm ($id) {
        $id = (int)$id;

        $product = \App\Models\Product::find($id);

        $params = [
            'product' => $product
        ];

        \App\Util\View::load('admin/products.edit', $params);
    }

    public function updateProduct ($id) {
        $id = (int)$id;

        $product = \App\Models\Product::find($id);

        $product->name = trim($_POST['name']);
        $product->price = (float)$_POST['price'];
        $product->stock = (int)$_POST['stock'];
        $product->description = trim($_POST['description']);

        if (isset($_POST['delete'])) {
            foreach ($_POST['delete'] as $path => $on) {
                $product->removeImageByPath($path);
            }
        }

        $product = $this->handleFileUpload($product);

        $product->save();

        header("Location: " . APP_BASE . "admin/products/edit/$id");
        exit;
    }

    private function handleFileUpload (Product $product) {
        $uploadDir = __DIR__ . '/../Assets/product_images/';

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $mimeType = $_FILES['images']['type'][$key];
            $uploadName = $uploadDir . basename($_FILES['images']['name'][$key]); // path & dateiname

            if (substr($mimeType, 0, 5) === 'image') {
                move_uploaded_file($tmp_name, $uploadName);
                $product->addImage($uploadName);
            }
        }

        return $product;
    }

    public function addForm () {
        if (isset($_POST['name'])) {
            $new_product = new \App\Models\Product();

            $new_product->name = $_POST['name'];
            $new_product->price = $_POST['price'];
            $new_product->stock = $_POST['stock'];
            $new_product->description = $_POST['description'];

            $new_product = $this->handleFileUpload($new_product);

            $new_product->save();

            header("Location: " . APP_BASE . "admin/products");
            exit;
        } else {
            \App\Util\View::load('admin/products.add', []);
        }
    }

    public function delete ($id) {
        $id = (int)$id;

        $product = \App\Models\Product::find($id);
        $product->deleted = true;
        $product->save();

        header("Location: " . APP_BASE . "admin/products");
        exit;
    }

    /**
     * wird nicht funktionieren, weil es nur ein beispielinhalt ist!!!
     */
    public function filter () {
        $sizes = $_POST['size']; // size[38] => 'On', size[42] => 'On'
        $colors = $_POST['color']; // color[black] => 'On', color[white] => 'On'
        $new = $_POST['new'];

        $sql = [];
        $sql[] = "SELECT * FROM products WHERE ";

        // size
        $sql[] = "size IN (";
        $sizes_sql = [];
        foreach ($sizes as $size => $on) {
            $s = str_replace('size[', $size);
            $s = str_replace(']', $s);
            $sizes_sql[] = $s;
        }
        $sql[] = implode(',', $sizes_sql);
        $sql[] = ") "; // "SELECT * FROM products WHERE size IN (38,42)"

        // colors
        $sql[] = "AND color IN (";
        $colors_sql = [];
        foreach ($colors as $color => $on) {
            $c = str_replace('color[', $color); // black]
            $c = str_replace(']', $c); // black
            $colors_sql[] = $c;
        }
        $sql[] = implode(',', $sizes_sql);
        $sql[] = ") "; // "SELECT * FROM products WHERE size IN (38,42) AND color IN ("white","black")"

        // new
        if ($new === "on") {
            $sql[] = "AND new IS TRUE"; // "SELECT * FROM products WHERE size IN (38,42) AND color IN ("white","black") AND new IS TRUE"
        }

        $sql = implode('', $sql); // <-- erst jetzt haben wir einen einzelnen String, bisher war es ein Array
    }
}