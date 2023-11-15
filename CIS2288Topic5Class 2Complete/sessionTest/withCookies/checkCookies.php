<?php
// Author: Joey Kitson
// Date:
// Purpose: Checks to see if browser allows cookies
$cookieStatus = "Cookies are enabled on your browser!";
if (!isset($_GET['PHPSESSID']) && !isset($_GET['cookieTest']) && !isset($_POST['PHPSESSID'])) {
    setcookie('cookiesEnabled', 'yes', time() + (86400 * 30), "/");
    $location = $_SERVER['PHP_SELF'] . "?cookieTest=true";
    header("Location:" . $location);
    echo $location;
    echo "cookie test";
}

if (!isset($_COOKIE['cookiesEnabled'])) {


    ini_set("session.use_cookies", 0);
    ini_set("session.use_only_cookies", 0);
    ini_set("session.use_trans_sid", 1);
    /*Runtime Configuration
https://www.php.net/manual/en/session.configuration.php*/
//specifies whether the module will use cookies to store the session id on the client side.
// Defaults to 1 (enabled)
    $cookieStatus = "Cookies are not enabled on your browser, please turn them on!";
}

