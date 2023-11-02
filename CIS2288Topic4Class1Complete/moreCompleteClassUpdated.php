<?php
/*  Author: Don Bowers
	Purpose: Define a more thorough class in PHP. Using constructor magic method and magic getter and setters.
	Date: Oct 18, 2018
	Notes:
*/

class SimpleClass
{
	private $value = 'a default value';
    /**  Location for overloaded data.  */
    private $data = array();

	function __construct() {
		echo "<p>Constructor called.</p>";
	}
	
	function displayVar($name) {
		echo $this->__get($name);
	}
    /**
     * The __set() method (Magic Methods) is called whenever you attempt to write to
     * a non-existing or private property of an object.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        //echo "set:$name=$value<br />";
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
       // echo "get:$name<br />";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }else{
            //returns the value of the attribute even though it is private/hidden
            return $this->$name;
        }

    }

}

$test = new SimpleClass;
$test->joey = "Hello";
$test->joey .= "Boom";
$test->displayVar("joey");


?>