<?php

class Cart
{
    /**
     * @var array [product_id => quantity]
     */
    public $products = [];

    public function addProduct ($product_id, $quantity = 1) {
        if (isset($this->products[$product_id])) {
            $this->products[$product_id] += 1;
        } else {
            $this->products[$product_id] = $quantity;
        }
    }

    public function removeProduct ($product_id, $quantity = 'all') {
        if ($quantity === 'all') {
            unset($this->products[$product_id]);
        } else {
            $this->products[$product_id] = $this->products[$product_id] - (int)$quantity;
        }
    }

    public function updateQuantity ($product_id, $new_quantity = 1) {
        $this->products[$product_id] = $new_quantity;
    }

    public function mergeCarts () {

    }
}