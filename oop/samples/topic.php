<?php

class Topic {
    private $name;
    protected $id;
    public $human;

    public function __construct() {
        $tis->humane = new Human();
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = (int)$id;
    }
}

class NewsletterTopic extends Topic {
    public function getSpecialName () {
        return $this->name . ' - wohooo!';
    }

    public function getSpecialId () {
        return $this->id + 1;
    }
}

class ProductTopic extends Topic {
    public function getAllProductsFromTopic() {
        // ...
    }
}

$topic = new NewsletterTopic();
$topic->setId(1);
$topic->getSpecialName(); // Error
$topic->getSpecialId(); // 2
?>