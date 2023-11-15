<?php
// Author: Don Bowers/Eric Coffin
// Date:

// We will first run the require_login.php script before we do anything on this page.
session_start();
//set timeout
require_once ('sessionTimeout.php');

include('require_login.php');

//display all php errors and warnings is to add these lines to your PHP code file
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


// Logout by destroying the cookie, then re-direct to login_old.php
if (isset($_POST['logout'])) {
    // Remove all of the session variables.
    session_unset();

    // Delete the session cookie.
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Destroy the session
    session_destroy();
    header("Location: login.php");
    die();
}
?>
<?php
//Set username from $_COOKIE associative array
$userName = $_SESSION['userName'];

//Set time zone for the page
$date = date_create("now", timezone_open("America/Halifax"));
$dateString = date_format($date, "Y/m/d H:iP");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Main Page - only visible if user gave us a username</title>
</head>
<body>
<h1>Welcome <?php echo $userName ?></h1>
<p>The current time where the server lives is <?php echo $dateString ?></p>
<a href="http://canadipsum.com/" target="_blank">Why not Canadipsum?</a>
<p>
<p>Metric The Jaw gitch the patch Terminal City May Two-Four Quebec gino saltchuck skid tuque randy you know, and farmer
    vision Alberta ketchup chips The Rockies sliveen, for sure. The Sault Edmunston take off humidex T Dot Toon Town
    Saskatchewan bluenoser bunny hug you know, and newfie tan Skinny puppy Whitehorse. Richmond lord stanley The
    Interior bears CN Tower buckle bunny province Justin Bieber Nickelback two-four Saskatchewan YTV The 905 Fort
    St.John;, hey! Richmond territories Toronto Maple Leafs Thompson hose maple syrup Iqaluit Fort Mcmurray Winkler
    two-four: Burlington rad Mississauga Vancouver Special Hersheys Yukon Whitehorse gripper! Alexander Keith's fishfly
    farmer turn The Peg Whistler Waterloo rye and ginger Montreal Nanaimo bar Kitchener Fredericton gino Edmunston
    Timbits Fort Mcmurray, foof, hey.</p>

<form method="POST" action="index.php">
    <input type="hidden" name="logout"/>
    <input type="submit" value="logout"/>
</form>
</body>
</html>