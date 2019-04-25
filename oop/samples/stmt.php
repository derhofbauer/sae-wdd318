<?php

// dbconnect.php ist bereits irgendwo eingebunden

class Stmt {
    public $query;
    public $link;

    public function __construct($link) {
        $this->link = $link;
    }

    public function executeQuery ($query) {
        $this->query = $query;
        mysqli_execute($this->link, $query);
    }

    public function __destruct() {
        echo "done!";
    }
}

$mysql = new Stmt($link); // Stmt->__construct()
$mysql->executeQuery('SELECT * FROM users');

unset($mysql); // "done!"

?>