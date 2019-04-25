

Class --> Object


Class
 + Properties
 + Methods

// Bsp
<?php 
class Human {
    public $name;
    public $birthday;
    private $gender;
    protected $email;

    public function __construct() {
        // do something on init
    }

    public function sleep() {

    }

    public function sayHello() {
        echo "hallo, mein name ist " . $this->name;
    }

    public function __desctruct() {}
}

$kim = new Human();
$kim->name = "Kim";
$kim->sayHello(); // "hallo, mein name ist Kim";

?>