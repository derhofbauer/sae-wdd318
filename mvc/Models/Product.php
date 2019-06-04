<?php

class Product
{
    public $id;
    public $name;
    public $price;
    public $stock;
    public $description;
    public $images = [];
    public $deleted = 0;

    public function fill ($dbResult)
    {
        $this->id = $dbResult['id'];
        $this->name = $dbResult['name'];
        $this->description = $dbResult['description'];
        $this->price = $dbResult['price'];
        $this->stock = $dbResult['stock'];
        $this->deleted = $dbResult['deleted'];
        $this->images = explode(',', $dbResult['images']);
    }

    public static function fillMultiple (array $dbResult)
    {
        $products = [];

        foreach ($dbResult as $product) {
            $p = new Product();
            $p->fill($product);

            $products[] = $p;
        }

        return $products;
    }

    public static function all ()
    {
        $db = new DB();

        $result = $db->query('SELECT * FROM products WHERE deleted != TRUE');
        return self::fillMultiple($result);
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

    public static function getByIds (array $ids)
    {
        $db = new DB();

        $ids = implode(',', $ids);

        $result = $db->query("SELECT * FROM products WHERE id IN ({$ids})", []);  // <-- quick und dirty!

        return self::fillMultiple($result);
    }

    public function save ()
    {
        $db = new DB();

        $images = implode(',', $this->images);

        if (isset($this->id) && !empty($this->id)) {
            $db->query("UPDATE products SET name=?, price=?, stock=?, description=?, images=?, deleted=? WHERE id = ?", [
                's:name' => $this->name,
                'd:price' => $this->price,
                'i:stock' => $this->stock,
                's:description' => $this->description,
                's:images' => $images,
                'i:deleted' => $this->deleted,
                'i:id' => $this->id
            ]);
        } else {
            $db->query("INSERT INTO products SET name=?, price=?, stock=?, description=?, images=?, deleted=0", [
                's:name' => $this->name,
                'd:price' => $this->price,
                'i:stock' => $this->stock,
                's:description' => $this->description,
                's:images' => $images
            ]);
        }
    }

    public function removeImageByPath ($path, $deleteFile = true)
    {
        $_images = [];

        foreach ($this->images as $image) {
            if ($image != $path) {
                $_images[] = $image;
            } else {
                if ($deleteFile === true) {
                    $file = __DIR__ . "/../Assets/$image";
                    unlink($file);
                }
            }
        }

        $this->images = $_images;
    }

    public function addImage ($path)
    {
        $needle = 'Assets/';
        $indexOfAssets = strpos($path, $needle);
        $pathWithoutAssets = substr($path, $indexOfAssets + strlen($needle));
        $this->images[] = $pathWithoutAssets;
    }
}

?>