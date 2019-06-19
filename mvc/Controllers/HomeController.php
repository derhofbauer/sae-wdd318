<?php

namespace App\Controllers;

class HomeController {

    public function index() {
        $products = \App\Models\Product::all();

        $params = [
            'htmltitle' => 'Startseite',
            'products' => $products
        ];

        \App\Util\View::load('home', $params);
    }

}

?>