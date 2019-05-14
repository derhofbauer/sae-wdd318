<?php

class CartController {

    public function list () {
        // ...

        $params = [];

        load_view('cart', $params);
    }

    public function addProduct ($id) {
        $id = (int)$id;

        // add to cart
        if (isset($_SESSION['user_id'])) {
            // user eingeloggt, verwende DbCart
        } else {
            // user nicht eingeloggt, verwende SessionCart
            $cart = new SessionCart();
            $cart->addProduct($id);

            // var_dump($cart);
        }

        header("Location: http://localhost:8080/mvc/products/show/{$id}");
        exit;
    }

}