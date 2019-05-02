<?php 

class User {
    protected $id;
    protected $email;
    protected $password_hash;
    protected $is_admin = false;

    public function __construct(int $id, $email, $password_hash = '') {
        $this->id = $id;
        $this->email = (string)$email;
        $this->password_hash = (string)$password_hash;
    }

    public function setId (int $id) {
        $this->id = $id;
    }

    public function getId () {
        return $this->id;
    }

    public function setEmail ($email) {
        $this->email = (string)$email;
    }

    public function getEmail () {
        return $this->email;
    }

    public function setPasswordHash ($password_hash) {
        $this->password_hash = (string)$password_hash;
    }

    public function checkPassword ($password_input) {
        $is_password_ok = password_verify($password_input, $this->password_hash);
        return $is_password_ok;
    }

    public function getIsAdmin () {
        return (bool)$this->is_admin;
    }

    public function setIsAdmin (bool $is_admin) {
        $this->is_admin = $is_admin;
    }
}

?>