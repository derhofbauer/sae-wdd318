<?php 

class Topic {
    protected $id;
    protected $name;

    public function __construct (int $id, $name = '') {
        $this->id = $id;
        $this->name = (string)$name;
    }

    public function setId (int $id) {
        $this->id = $id;
    }

    public function getId () {
        return $this->id;
    }

    public function setName ($name) {
        $this->name = (string)trim($name);
    }

    public function getName () {
        return $this->name;
    }
}

?>