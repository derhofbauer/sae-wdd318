<?php

class Product
{
    public $id;
    public $name;
    public $price;
    public $stock;
    public $description;
    public $images;

    public function fill($dbResult) {
        $this->id = $dbResult['id'];
        $this->name = $dbResult['name'];
        $this->description = $dbResult['description'];
        $this->price = $dbResult['price'];
        $this->stock = $dbResult['stock'];
        $this->images = explode(',', $dbResult['images']);

        $this->images = array_map(function ($value) {
            return "http://localhost:8080/mvc/Assets/${value}";
        }, $this->images);
    }

    public static function all ()
    {
        $db = new DB();

        $result = $db->query('SELECT * FROM products');
        $products = [];

        foreach ($result as $product) {
            $p = new Product();
            $p->fill($product);

            array_push($products, $p);
        }

        return $products;
    }

    /**
     * Einzelnes Model (Product) abfragen
     *
     * @param int $id
     *
     * @return Product
     */
    public static function find (int $id)
    {
        $db = new DB();

        $result = $db->query('SELECT * FROM products WHERE id = ?', [
            'i:id' => $id
        ]);

        $p = new Product();
        $p->fill($result[0]);

        return $p;
    }
}

?>