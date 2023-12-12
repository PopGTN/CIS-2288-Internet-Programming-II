<?php
/**
 * Author: Donnie McKinnon, Joshua Mckenna
 * since 12/12/2023
 * This is the login page. it handles all the login requests
 */

session_start();
include 'CisUtil.class.php';
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    header("location:index.php");
    exit;
}
$pageTitle = "News - Login";
include("incPageHead.php");

const USERNAME = "admin";
const PASSWORD = 'news2288';
//Login processing logic here
//Validate form input against hard coded values for username and password


//$_SESSION["loggedIn"] = true;

if (isset($_POST['submit'])) {
    $username = CisUtil::cleanInputs($_POST['username']);
    $password = CisUtil::cleanInputs($_POST['password']);
    if (strcasecmp(USERNAME, $username) == 0 && strcasecmp(PASSWORD, $password) == 0) {
        $_SESSION["loggedIn"] = true;
        header("location:index.php");
        exit;
    } else {
        $error = "Bad credentials.";
    }
}
?>
<form action="login.php" method="post">
    <div class="form-group">
        <label for="user">Username:</label>
        <input type="text" name="username" id="user" class="form-control"/><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control"/><br>
        <input type="submit" name="submit" value="Login" class="btn btn-default"/>
    </div>
</form>
<?php
if (isset($error)) {
    echo "<div class='alert alert-danger'>$error</div>";
}

include("incPageFoot.php");




?>