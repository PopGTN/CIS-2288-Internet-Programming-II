<?php
// Author: jdkitson
// Date:
//Secure page
// start session
session_start();
//Secure the page
require_once('checkLoggedIn.php');

/*// check for logged in session
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'])
{
    // user is not logged in
    // re-direct user to login_old.php
    header("Location: login.php?message=notLoggedIn");
    exit;
}*/

?>
<?php
//print_r($_SESSION);
//Set username from $_SESSION associative array
$userName = $_SESSION["username"];

//Set time zone for the page
$date = date_create("now", timezone_open("America/Halifax"));
$dateString = date_format($date, "Y/m/d H:iP");
$page = "page2";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Page 2 - only visible if user gave us a username</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<body>
<div id="container">
    <?php require_once('nav.php'); ?>
    <h1>Welcome <?php echo $userName ?></h1>
    <h3>Page 2</h3>
    <p>The current time where the server lives is <?php echo $dateString ?></p>
    <a href="http://canadipsum.com/" target="_blank">Why not Canadipsum?</a>
    <p>
    <p>Metric The Jaw gitch the patch Terminal City May Two-Four Quebec gino saltchuck skid tuque randy you know, and
        farmer
        vision Alberta ketchup chips The Rockies sliveen, for sure. The Sault Edmunston take off humidex T Dot Toon Town
        Saskatchewan bluenoser bunny hug you know, and newfie tan Skinny puppy Whitehorse. Richmond lord stanley The
        Interior bears CN Tower buckle bunny province Justin Bieber Nickelback two-four Saskatchewan YTV The 905 Fort
        St.John;, hey! Richmond territories Toronto Maple Leafs Thompson hose maple syrup Iqaluit Fort Mcmurray Winkler
        two-four: Burlington rad Mississauga Vancouver Special Hersheys Yukon Whitehorse gripper! Alexander Keith's
        fishfly
        farmer turn The Peg Whistler Waterloo rye and ginger Montreal Nanaimo bar Kitchener Fredericton gino Edmunston
        Timbits Fort Mcmurray, foof, hey.</p>

    <!--<a href="logout.php" target="_blank">Logout</a>-->
</div>
</body>
</html>