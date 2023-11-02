<?php
//Loads all classes
spl_autoload_register(function ($class) {
    //include 'classes/' . $class . '.class.php';
    //include $class . '.php';
    include 'classes/' .$class . '.php';
});

$strawberry = new Strawberry("Strawberry", "red", 50);
$strawberry->name = "Apple";
$strawberry->message();
//Member has protected access
//$strawberry->intro();