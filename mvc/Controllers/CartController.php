<?php

class CartController
{

    public function list ()
    {
        $productIdsInCart = array_keys($_SESSION['cart']);

        $products = [];
        if (count($productIdsInCart) > 0) {
            $products = Product::getByIds($productIdsInCart);
        }

        $total = 0;
        foreach ($products as $product) {
            $subtotal = $_SESSION['cart'][$product->id] * $product->price;
            $total = $total + $subtotal;
        }
        $total = round($total, 2);

        $params = [
            'products' => $products,
            'total' => $total
        ];

        View::load('cart', $params);
    }

    public function addProduct ($id)
    {
        $id = (int)$id;

        // add to cart
        //if (isset($_SESSION['user_id'])) {
        // user eingeloggt, verwende DbCart
        //} else {
        // user nicht eingeloggt, verwende SessionCart
        $cart = new SessionCart();
        $cart->addProduct($id);

        // var_dump($cart);
        //}

        header("Location: " . APP_BASE . "products/show/{$id}");
        exit;
    }

    public function removeProduct ($id)
    {
        $id = (int)$id;

        $cart = new SessionCart();
        $cart->removeProduct($id);

        header("Location: " . APP_BASE . "cart");
        exit;
    }

    public static function cartCount ()
    {
        $cartCount = 0;

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $amount) {
                $cartCount = $cartCount + $amount;
            }
        }

        return $cartCount;
    }
}





