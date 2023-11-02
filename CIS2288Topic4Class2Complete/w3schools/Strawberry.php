<?php

//require_once('Fruit.php');

// Or, using an anonymous function as of PHP 5.3.0
spl_autoload_register(function ($class) {
    //include 'classes/' . $class . '.class.php';
    include $class . '.php';
});

class Strawberry extends Fruit
{
    private $weight;

//Undefined property: Strawberry::$weight --
// Existing child/subclass members/attributes need to be protected or
// public to be accessed using the parent/super class magic functions.
//    protected $weight;

    public function __construct($name, $color, $weight)
    {
        //Pass required arguments to the parent/super class custom constructor when members/attributes are private
        parent::__construct($name, $color);

//        $this->name = $name;
//        $this->color = $color;
        $this->weight = $weight;
    }

    public function message()
    {
        echo "Am I a fruit or a berry? <br/>";
        // intro() must be public or protected to be invoked from within derived class - OK
        $this->intro();
    }

    //Override parent/super class function
    public function intro()
    {
        echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }


}

$strawberry = new Strawberry("Strawberry", "red", 50);
//$strawberry->name = "Apple";
$strawberry->setWeight(75);
$strawberry->weight = 125;
$strawberry->message();
echo "<br/>" . $strawberry->weight;
//Member has protected access
//$strawberry->intro();