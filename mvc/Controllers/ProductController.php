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
        var_dump($_POST);
        // daten validieren
        // product speichern
        // redirect auf editForm
    }
}