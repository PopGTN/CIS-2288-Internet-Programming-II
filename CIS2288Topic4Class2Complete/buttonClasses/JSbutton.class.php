<?php
/*
	Add javascript attributes to our Button
*/

//require_once('Button.php');
// Or, using an anonymous function as of PHP 5.3.0
spl_autoload_register(function ($class) {
	include $class . '.class.php';

});

class JSButton extends Button {

	private $onClickVal;
	
	function __construct(){
		parent::__construct();
	
		$this->onClickVal="";
	}
	
	//Override __set to not allow non-existent properties
	public function __set($name, $value)
	{
		$this->$name = $value;

	}
	//Override __get to not allow non-existent properties
	public function __get($name)
	{
			//returns the value of the attribute even though it is private/hidden
			return $this->$name;

	}
	
	// override display method
	
	function displayButton() {
		echo '<input type="submit" value="'. $this->buttonName . '" style="'. $this->buttonStyle . '" name="'. $this->buttonName. '" onclick="'. $this->onClickVal .'"/>';
	}
}

$test = new JSButton();
$test->buttonName="button1";
$test->buttonValue="submit";
$test->buttonStyle="border:1px solid black;";
$test->onClickVal="alert('hi');";
$test->displayButton();

?>

