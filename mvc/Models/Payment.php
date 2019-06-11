<?php

class Payment
{
    public $id;
    public $name;
    public $number;
    public $expires;
    public $ccv;
    public $user_id;

    public function fill ($dbResult)
    {
        $this->id = $dbResult['id'];
        $this->name = $dbResult['name'];
        $this->number = $dbResult['number'];
        $this->expires = $dbResult['expires'];
        $this->ccv = $dbResult['ccv'];
        $this->user_id = $dbResult['user_id'];
    }

    public static function fillMultiple (array $dbResult)
    {
        $payments = [];

        foreach ($dbResult as $payment) {
            $p = new Payment();
            $p->fill($payment);

            $payments[] = $p;
        }

        return $payments;
    }

    public function save ()
    {
        $db = new DB();

        if (isset($this->id) && !empty($this->id)) {
            $db->query("UPDATE payments SET name=?, number=?, expires=?, ccv=?, user_id=? WHERE id = ?", [
                's:name' => $this->name,
                'i:number' => $this->number,
                's:expires' => $this->expires,
                'i:ccv' => $this->ccv,
                'i:user_id' => $this->user_id,
                'i:id' => $this->id
            ]);
        } else {
            $db->query("INSERT INTO payments SET NAME=?, number=?, expires=?, ccv=?, user_id=?", [
                's:name' => $this->name,
                'i:number' => $this->number,
                's:expires' => $this->expires,
                'i:ccv' => $this->ccv,
                'i:user_id' => $this->user_id
            ]);
            $result = $db->query("SELECT * FROM payments ORDER BY id DESC LIMIT 1");
            $this->fill($result[0]);
        }
        return $this;
    }

    public static function findByUser ($user_id)
    {
        $user_id = (int)$user_id;

        $db = new DB();
        $result = $db->query('SELECT * FROM payments where user_id=?', [
           'i:user_id' => $user_id
        ]);

        return self::fillMultiple($result);
    }

    public static function find (int $id)
    {
        $db = new DB();

        $result = $db->query('SELECT * FROM payments WHERE id = ?', [
            'i:id' => $id
        ]);

        $p = new Payment();
        $p->fill($result[0]);

        return $p;
    }
}