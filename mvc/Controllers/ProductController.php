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
}