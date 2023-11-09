<?php
    // Author: Don Bowers/Eric Coffin
    // Date:
    // Purpose: Check for cookie and if it is not set send user back to login. Note that we do not need any html on this page as nothing
    // actually gets rendered.
if (!isset($_COOKIE['userName'])) {
        // if the user does not have a cookie 'userName', we send them packing back to
        // the login screen with the header() function.

        // ideally we will store this file in a directory that the user cannot access via URL.

        header('Location: login.php');
        die(); // this ensures that nothing executes on the page after the redirect
    //die( Header( 'Location: login_old.php' ) );
   }