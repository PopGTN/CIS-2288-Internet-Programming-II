<?php
/**
 * @author Joshua Mckena, Donnie McKinnon
 * @since 12/12/2023
 * Used to display all of the stories to all users. Logged in users will have the options to edit the stories
 */

global $isLoggedIn;
session_start();
$pageTitle = "News - Home";
include("incPageHead.php");
require 'CisUtil.class.php';
?>
    <div class="jumbotron"></div>
<?php
require("connect.php");
global $mysqli;


$query = "SELECT * FROM news";
$result = $mysqli->query($query);
$num_results = $result->num_rows;
$stories = $result->fetch_all(MYSQLI_ASSOC);
$result->free();
$mysqli->close();

if (isset($stories[0]) || count($stories) != 0) {
    foreach ($stories as $story) {
        CisUtil::addStory($story['storyId'],$story['headline'],$story['storyDetails'],$isLoggedIn);
    }
}


include("incPageFoot.php");
?>