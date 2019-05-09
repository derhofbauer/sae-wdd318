<?php

class Product
{
    public $id;
    public $name;
    public $price;
    public $stock;
    public $description;
    public $images;

    public static function all() {
        $db = new DB();

        $result = $db->query('SELECT * FROM products');
        $products = [];

        foreach ($result as $product) {
            $p = new Product();
            $p->id = $product['id'];
            $p->name = $product['name'];
            $p->description = $product['description'];
            $p->price = $product['price'];
            $p->stock = $product['stock'];
            $p->images = $product['images'];

            array_push($products, $p);
        }

        return $products;
    }
}

?>