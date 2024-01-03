<?php
/**
 * @author Joshua Mckena, Donnie McKinnon
 * @since 12/12/2023
 * Used to connect to the database
 */
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
const DB_SERVER = 'localhost';
const DB_USERNAME = 'web_only_user';
const DB_PASSWORD = 'web_secret_password';
const DB_NAME = 'books';

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
