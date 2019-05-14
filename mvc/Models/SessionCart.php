<?php

class SessionCart extends Cart {

    public function __construct ()
    {
        /**
         * $_SESSION['cart']['1' => 2, '34' => 1]
         */
        if (isset($_SESSION['cart'])) {
            $this->products = $_SESSION['cart'];
        }
    }

    public function __destruct ()
    {
        $_SESSION['cart'] = $this->products;
    }
}