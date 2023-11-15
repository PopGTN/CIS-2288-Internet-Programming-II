<?php
	// Author: Don Bowers/Eric Coffin
	// Date:
	// Purpose: Demo how easy it is to use Sessions
//require_once ('checkCookies.php');

	// we use this whenever we want to access the session!
session_start();
require_once ('sessionTimeout.php');
//echo $cookieStatus;
	// we can 'name' our vars whatever we want and set them to a value. We simply access the superglobal $_SESSION array and set it up
	$_SESSION['testVar'] = 1;

	// we can even add arrays inside our session vars
	$_SESSION['nameArray'] = array('Peter','Paul','Mary');

	echo "<p>Session has been started...<br />I put three names into the session array...</p>";
	print_r($_SESSION);

	echo "<a href='sessionTest2.php'>Go to next page and see that they still exist!</a>";
    //var_dump($_COOKIE);
?>