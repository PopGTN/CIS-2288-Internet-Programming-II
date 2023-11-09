<?php
// Author: Don Bowers/Eric Coffin
// Date:

/*
login_old.php
====
Prompt the user for a username and add this to a cookie called userName.
If the user loads this page and they have the cookie userName already. We will forward them to index.php.

*/
require_once('utilities.php');
if (!isset($_COOKIE["userName"])) {
//Present user with form on first load or when userName is empty on submission and cookie is not set
    if ((!isset($_POST["submit"]) || empty($_POST["userName"]))) {

        ?>
        <!DOCTYPE html>
        <html>
        <body><h1>Login Page</h1>
        <p>This is the login page. It is public and asks the user for their username.</p>
        <form method="POST" action="login_old.php">
            Username:<input type="text" name="userName"/>
            <input type="submit" name="submit"/>
        </form>
        </body>
        </html>
        <?php

//Form was submitted and userName has a value
    } else {
        $userName = test_input($_POST["userName"]);
        // set the cookie with the value the user gave us from the text input called
        // userName.  This will expire in 24 hours.
        setcookie("userName", $userName, time() + 60 * 60 * 24);
        header('Location: index.php');
        die();
    }
} else {

    header('Location: index.php');
    die();
}

