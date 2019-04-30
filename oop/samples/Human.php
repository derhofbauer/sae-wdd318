<?php

class Human {
    public $name = 'Steve';
    private $age;
    protected $email;

    public function __construct($name, $age = null) {
        $this->name = $name;
        $this->age = $age;
    }

    public static function sayHello() {
        return "ugah";
    }

    private function sleep() {
        // ...
    }

    public function __destruct() {

    }
}

class Woman extends Human {
    public function sayHello() {
        return "Hallo";
    }

    public function getAge () {
        return $this->age;
    }
}

$dani = new Woman('Dani');
echo($dani->name);
echo($dani->age);

echo(Human::sayHello()); // ugah


unset($dani);
?>