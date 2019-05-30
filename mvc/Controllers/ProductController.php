<?php

class ProductController {

    public function show ($id) {
        $id = (int)$id;

        $product = Product::find($id);

        $params = [
            'product' => $product
        ];

        View::load('product.detail', $params);
    }

    public function list () {
        die('product list');
    }

    public function adminList () {
        $products = Product::all();

        $params = [
            'products' => $products
        ];

        View::load('admin/products.list', $params);
    }

    public function editForm ($id) {
        $id = (int)$id;

        $product = Product::find($id);

        $params = [
            'product' => $product
        ];

        View::load('admin/products.edit', $params);
    }

    public function updateProduct ($id) {
        $id = (int)$id;

        $product = Product::find($id);

        $product->name = trim($_POST['name']);
        $product->price = (float)$_POST['price'];
        $product->stock = (int)$_POST['stock'];
        $product->description = trim($_POST['description']);

        if (isset($_POST['delete'])) {
            foreach ($_POST['delete'] as $path => $on) {
                $product->removeImageByPath($path);
            }
        }

        $uploadDir = __DIR__ . '/../Assets/product_images/';

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $mimeType = $_FILES['images']['type'][$key];
            $uploadName = $uploadDir . basename($_FILES['images']['name'][$key]); // path & dateiname

            if (substr($mimeType, 0, 5) === 'image') {
                move_uploaded_file($tmp_name, $uploadName);
                $product->addImage($uploadName);
            }
        }

        $product->save();

        header("Location: " . APP_BASE . "admin/products/edit/$id");
        exit;
    }
}