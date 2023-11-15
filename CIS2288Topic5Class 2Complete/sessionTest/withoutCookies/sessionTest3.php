<?php

    //echo "Cookies are not enabled on your browser, please turn them on!";
    /*Runtime Configuration
https://www.php.net/manual/en/session.configuration.php*/

//specifies whether the module will use cookies to store the session id on the client side.
// Defaults to 1 (enabled)
    ini_set("session.use_cookies",0);
//When use_only_cookies is disabled, PHP will pass the session ID via the URL.
// This makes the application more vulnerable to session hijacking attacks.
// Session hijacking is basically a form of identity theft wherein a hacker impersonates a legitimate
// user by stealing his session ID. When the session token is transmitted in a cookie,
// and the request is made on a secure channel (that is, it uses SSL), the token is secure.
    ini_set("session.use_only_cookies",0);
//if you enable "use_trans_sid" then the session id is attached to the URL everytime.
//You need trans_sid when the user has cookies disabled, but its kind of insecure
//Think about someone is looking on your screen and writes down your session id?
    ini_set("session.use_trans_sid",1);

session_start();

// we can 'name' our vars whatever we want and set them to a value. We simply access the superglobal $_SESSION array and set it up
$_SESSION['testVar'] = 1;

// we can even add arrays inside our session vars
$_SESSION['nameArray'] = array('Peter','Paul','Mary');

echo "<p>Session has been started...<br />I put three names into the session array...</p>";

echo "<a href='sessionTest4.php'>Go to next page and see that they still exist!</a>";
