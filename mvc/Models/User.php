<?php

class User
{
    public $id;
    public $name;
    public $email;
    private $password_hash;

    public function fill ($dbResult)
    {
        $this->id = $dbResult['id'];
        $this->name = (isset($dbResult['name']) ? $dbResult['name'] : null);
        $this->email = $dbResult['email'];
        $this->password_hash = $dbResult['password'];
    }

    public static function findByEmail (string $email)
    {
        $db = new DB();

        $result = $db->query('SELECT * FROM users WHERE email = ?', [
            's:email' => trim($email)
        ]);

        if (count($result) === 0) {
            return false;
        }

        $user = new User();
        $user->fill($result[0]);
        return $user;
    }

    public function checkPassword (string $password) {
        $password = trim($password);
        return password_verify($password, $this->password_hash);
    }

    /**
     * Einzelnes Model (User) abfragen
     *
     * @param int $id
     *
     * @return User
     */
    public static function find (int $id)
    {
        $db = new DB();

        $result = $db->query('SELECT name FROM users WHERE id = ?', [
            'i:id' => $id
        ]);

        $user = new User();
        $user->fill($result[0]);

        return $user;
    }
}










