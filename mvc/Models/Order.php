<?php

class Order
{
    public $id;
    public $total_price;
    public $delivery_address_id;
    public $invoice_address_id;
    public $user_id;
    public $crdate;
    public $products;
    public $status = 'open';

    public function fill ($dbResult)
    {
        $this->id = $dbResult['id'];
        $this->total_price = $dbResult['total_price'];
        $this->delivery_address_id = $dbResult['delivery_address_id'];
        $this->invoice_address_id = $dbResult['invoice_address_id'];
        $this->user_id = $dbResult['user_id'];
        $this->crdate = $dbResult['crdate'];
        $this->products = $dbResult['products'];
        $this->status = $dbResult['status'];

        return $this; // <-- haben wir überall anders noch nicht gemacht :D
    }

    public function save ()
    {
        $db = new DB();

        if (isset($this->id) && !empty($this->id)) {
            $db->query("UPDATE orders SET total_price=?, delivery_address_id=?, invoice_address_id=?, user_id=?, products=?, status=? WHERE id = ?", [
                'd:total_price' => $this->total_price,
                'i:delivery_address_id' => $this->delivery_address_id,
                'i:invoice_address_id' => $this->invoice_address_id,
                'i:user_id' => $this->user_id,
                's:products' => $this->products,
                's:status' => $this->status,
                'i:id' => $this->id
            ]);
        } else {
            $db->query("INSERT INTO orders SET total_price=?, delivery_address_id=?, invoice_address_id=?, user_id=?, products=?, status=?", [
                'd:total_price' => $this->total_price,
                'i:delivery_address_id' => $this->delivery_address_id,
                'i:invoice_address_id' => $this->invoice_address_id,
                'i:user_id' => $this->user_id,
                's:products' => $this->products,
                's:status' => $this->status
            ]);
        }
    }
}