<?php
// Author: Don Bowers/Eric Coffin
// Date:

/*
login_old.php
====
Prompt the user for a username and add this to a cookie called userName.
If the user loads this page and they have the cookie userName already. We will forward them to index.php.

*/
require_once ('utilities.php');

// if the user has not logged in yet, we need to set the cookie !
if (!isset($_COOKIE["userName"])) {

    // first see if the user has submitted a form providing us the username.
    if (isset($_POST["submit"]) && !empty($_POST["userName"])) {

        $userName = test_input($_POST["userName"]);

        // set the cookie with the value the user gave us from the text input called
        // userName.  This will expire in 24 hours.
        setcookie("userName", $userName, time() + 60 * 60 * 24);
        header('Location: index.php');

        //echo "<!DOCTYPE html><html><body><h1>Thank you for logging in " . $userName . "</h1>";


        // The user can now proceed another page, where we will again check for the
        // existence of the cookie using require_login.php code snippet.  If they don't have it, we will send them
        // back here.

       // echo "<a href=\"index.php\">Continue</a></body></html>";

    } else {
        //Present user with form on first load and when userName filed is submitted as empty
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
    }
} else {
    // the cookie is set... so we will send the user back to page2.php.
    // no need to get username again.  they need to click 'logout' button
    // in order to delete cookie.
    header('Location: index.php');
    die();
}
?>