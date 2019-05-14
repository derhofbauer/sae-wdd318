<?php

class ProductController {

    public function show ($id) {
        $id = (int)$id;

        $product = Product::find($id);

        $params = [
            'product' => $product
        ];

        load_view('product.detail', $params);
    }
    
}