<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

$sessionName = session_name();
$sessionID = session_id();
$msg = "SessionID: ".$sessionID."<br/>";

//Set put some info into the session

$_SESSION['name'] = 'JoeyKitson';
$_SESSION['email'] = 'jdkitson@hollandcollege.com' ;

// Check the session name exists or not
if( isset($_SESSION['name']) ) {
    $msg .= 'session is set.<br>';
    $msg .= $_SESSION['name'].'<br>';
    $msg .= $_SESSION['email'].'<br>';
}
else {
    $msg .= 'session variable are unset';
}

// Unset all of the session variables.
//$_SESSION = array();
session_unset();

// Check the session name exists or not
if( isset($_SESSION['name']) ) {
    $msg .= 'session is set.<br>';
}
else {
    $msg .= 'session variables are unset<br>';
}

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Check the session name exists or not
if( isset($_COOKIE[$sessionName]) ) {
    $msg .= 'session cookie is set.<br>';
}else{

    $msg .= 'session cookie is unset.<br>';
}

// Finally, destroy the session.
//session_regenerate_id();
session_destroy();

//Check to see if session was destroyed
$msg .= "SessionID: ".session_id()."<br/>";

//Create a new session with ne session ID
session_start();

$msg .= "SessionID: ".session_id()."<br/>";

echo $msg;