<?php

class User
{
    public $id;
    public $name;
    public $email;
    private $password_hash;
    public $deleted = false;

    public function fill ($dbResult)
    {
        $this->id = $dbResult['id'];
        $this->name = (isset($dbResult['name']) ? $dbResult['name'] : null);
        $this->email = $dbResult['email'];
        $this->password_hash = $dbResult['password'];
        $this->deleted = (bool)$dbResult['deleted'];
    }

    public static function fillMultiple (array $dbResult)
    {
        $users = [];

        foreach ($dbResult as $user) {
            $u = new User();
            $u->fill($user);

            $users[] = $u;
        }

        return $users;
    }

    public static function all ()
    {
        $db = new DB();

        $result = $db->query('SELECT * FROM users WHERE deleted != TRUE');
        return self::fillMultiple($result);
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

    public function checkPassword (string $password)
    {
        $password = trim($password);
        return password_verify($password, $this->password_hash);
    }

    public function setPassword (string $password)
    {
        $password = trim($password);
        $this->password_hash = password_hash($password, PASSWORD_BCRYPT);
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

        $result = $db->query('SELECT * FROM users WHERE id = ?', [
            'i:id' => $id
        ]);

        $user = new User();
        $user->fill($result[0]);

        return $user;
    }

    public function save ()
    {
        $db = new DB();

        if (isset($this->id) && !empty($this->id)) {
            $db->query("UPDATE users SET name=?, email=?, password=?, deleted=? WHERE id = ?", [
                's:name' => $this->name,
                's:email' => $this->email,
                's:password_hash' => $this->password_hash,
                'i:deleted' => (int)$this->deleted,
                'i:id' => $this->id
            ]);
        } else {
            $db->query("INSERT INTO users SET name=?, email=?, password=?", [
                's:name' => $this->name,
                's:email' => $this->email,
                's:password_hash' => $this->password_hash
            ]);
            $result = $db->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
            $this->fill($result[0]);
        }
        return $this;
    }
}










