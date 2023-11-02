<?php
/*  Author: Don Bowers
	Purpose: define a simple class in PHP
	Date: Oct 18, 2018
	Notes: The only property (instance variable is $value) Only one method / function.  This prints the $value variable. */

class SimpleClass
{
	public $value = 'a default value';

	function displayVar() {
		echo $this->value;
	}
}

// Let's create a SimpleClass object.

$test = new SimpleClass();
$test->value = "Hello World!";

$test->displayVar();

?>