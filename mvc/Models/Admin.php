<?php

class Admin extends User
{
    public static function findByEmail (string $email)
    {
        $db = new DB();

        $result = $db->query('SELECT * FROM admin_users WHERE email = ?', [
            's:email' => trim($email)
        ]);

        if (count($result) === 0) {
            return false;
        }

        $user = new Admin();
        $user->fill($result[0]);
        return $user;
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

        $result = $db->query('SELECT * FROM admin_users WHERE id = ?', [
            'i:id' => $id
        ]);

        $user = new Admin();
        $user->fill($result[0]);

        return $user;
    }
}