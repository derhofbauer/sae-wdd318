<?php

class HomeController {

    public function index() {
        $products = Product::all();

        $params = [
            'htmltitle' => 'Startseite',
            'products' => $products
        ];

        View::load('home', $params);
    }

}

?>