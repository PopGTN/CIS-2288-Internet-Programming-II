<?php
global $root;
/**
 * @author Joshua Mckena
 * @since 12/15/2023
 * Used to check if the user is logged in if not sends them to the login in page
 */
session_start();

if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    header("Location: {$root}login");
    exit;
}