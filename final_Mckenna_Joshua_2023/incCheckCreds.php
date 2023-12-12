<?php
/**
 * @author Joshua Mckena, Donnie McKinnon
 * @since 12/12/2023
 * Used to check if the user is logged in if not sends them to the login in page
 */

session_start();

   // check if they are logged in, if not send to login.php
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    // user is not logged in
    // re-direct user to login_old.php
    header("Location: login.php");
    exit;
}
?>