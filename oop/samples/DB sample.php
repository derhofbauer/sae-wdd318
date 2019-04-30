<?php

abstract class DB {
    private $link;

    abstract protected function connect();
    abstract public function query();

    public function testConnection () {
        $this->link->host->ping(); // <-- BEISPIEL!!
    }

    public function __destruct () {
        $this->link->close();
    }
}

class MySQL extends DB {
    protected function connect() {
        // ...
    }

    public function query () {
        // ...
    }
}

class PgSQL extends DB {
    protected function connect() {
        // ...
    }

    public function query () {
        // ...
    }
}

?>