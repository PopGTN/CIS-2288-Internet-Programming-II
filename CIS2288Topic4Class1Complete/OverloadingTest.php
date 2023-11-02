<?php
/*
 * Overloading in PHP provides means to dynamically create properties and methods. These dynamic entities are processed via magic methods
 * one can establish in a class for various action types. The overloading methods are invoked when interacting with properties or methods
 * that have not been declared or are not visible in the current scope. The rest of this section will use the terms inaccessible properties
 *  and inaccessible methods to refer to this combination of declaration and visibility.
 *
 * All overloading methods must be defined as public.
 *
 *
 */

class OverloadingTest
{
    /**  Location for overloaded data.  */
    private $data = array();

    /**  Overloading not used on declared public properties.  */
    public $declared = 1;

    /**  Overloading only used on this when accessed outside the class.  */
    private $hidden = 2;

    /**
     * The __set() method (Magic Methods) is called whenever you attempt to write to
     * a non-existing or private property of an object.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        if(property_exists($this,$name)) {

            $this->$name = $value;

        }else{
            //An associative array s created when a property that has not been declared is set
            $this->data[$name] = $value;

        }
    }

    /**
     * The __get() method (Magic Methods) is called whenever you attempt to read a non-existing
     * or private property of an object.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }else{
            //returns the value of the attribute even though it is private/hidden
            return $this->$name;
        }

    }

    /**
     * As of PHP 5.1.0
     *
     * This magic method is invoked when we check overloaded
     * properties with isset() function
     *
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    /**
     * As of PHP 5.1.0
     *
     * This magic method is invoked when we check overloaded
     * properties with isset() function
     *
     * @param $name
     */
    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    /**  Not a magic method, just here for example. This is a regular getter  */
    public function getHidden()
    {
        return $this->hidden;
    }
}

echo "<pre>\n";

$obj = new OverloadingTest();

//Declare a non-existent property. Magic method __set() is invoked
//It adds "a" to associative array "$data"
$obj->a = 1;

//Magic method __get() is invoked
//It retrieves the value of "a" from associative array "$data"
echo $obj->a . "\n\n";

//Magic method __isset() is invoked
//Validates the existence of key "a" in associative array "$data" and returns boolean
var_dump(isset($obj->a));

//Magic method __unset() is invoked
//Validates the existence of key "a" in associative array "$data" and returns boolean
unset($obj->a);


//Magic method __isset() is invoked
//Validates the existence of key "a" in associative array "$data" and returns boolean
var_dump(isset($obj->a));


echo "\n";

echo $obj->declared . "\n\n";

echo "Let's experiment with the private property named 'hidden':\n";
echo "Privates are visible inside the class, so __get() not used...\n";
echo $obj->getHidden() . "\n";
echo "Privates not visible outside of class, so __get() is used...\n";
echo $obj->hidden . "\n";
echo "Privates not visible outside of class, so __set() is used...\n";
echo $obj->hidden = 12;
echo "Privates not visible outside of class, so __get() is used...\n";
echo $obj->hidden . "\n";