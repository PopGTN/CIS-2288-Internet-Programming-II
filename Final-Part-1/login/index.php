<?php
/**
 * @author Joshua Mckena
 * @since 12/12/2023
 * Used to login
 */
session_start();
global $isLoggedIn, $mysqli, $isUsernameValid, $isPasswordValid, $username, $password;
$root = "../";
require_once $root . 'lib/CisUtil.class.php';
require_once $root . 'lib/Header.class.php';
require_once $root . 'lib/FormBuilder.Bootstrap.class.php';

if (isset($_SESSION['loggedIn'])) {
    header("location:../");
}

if (isset($_POST['submit'])) {
    //Connects to database
    include("../lib/config.php");
    //cleans inputs
    $username = $mysqli->real_escape_string(CisUtil::cleanInputs($_POST["username"]));
    $password = $mysqli->real_escape_string(CisUtil::cleanInputs($_POST["password"]));


    $result = $mysqli->query("SELECT custUser FROM external_users WHERE BINARY custUser='" . $username . "'");

    //Check if result
    if (($result->num_rows != 1)) {
        $isUsernameValid = "is-invalid";
//        $isPasswordValid = "is-invalid";
    } else {
        $result->free();
        $result = $mysqli->query("SELECT custUser FROM external_users WHERE BINARY custUser='" . $username . "' AND custPass=sha1('" . $password . "')");

            //Check if result
            if ($result->num_rows == 1) {

            // Register $username, $password and redirect to file "index.php"
            $_SESSION["username"] = $username;
            //$_SESSION["password"] = $password;

            // set a session variable that is checked for
            // at the beginning of any of your secure .php pages
            $_SESSION["loggedIn"] = true;

            header("location:../");
        } else {
            $isPasswordValid = "is-invalid";
        }
    }

    $result->free();
    $mysqli->close();

}
//Set page title
$pageTitle = "Bookorama Management System";
//header
include $root . 'fragments/startOfPage.php';
//Navbar
include $root . "fragments/navbar.php";
?>
    <main id="main-container" class="d-flex justify-content-center align-items-center">

        <form class="mx-5 mt-md-0 px-3 col-12 col-lg-4 shadow p-3 mb-5 bg-body-tertiary rounded" method="post">
            <div class="mb-5">
                <h1 class="text-center fw-bold">Login</h1>
            </div>
            <div class="mb-3 is-invalid">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control <?= $isUsernameValid ?>" id="username" name="username" value="<?=$username?>">
                <div class="invalid-feedback">
                    Invalid username
                </div>
                <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>


            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control <?= $isPasswordValid ?>" name="password" id="password" value="<?=$password?>">
                <div class="invalid-feedback">
                    Invalid Password
                </div>
            </div>
            <!--<div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me!</label>
            </div>-->
            <div class="mt-3">
                <input type="submit" name="submit" value="Login" class="btn btn-primary px-3">
            </div>
        </form>

    </main>
<?php

include $root . 'fragments/footer.php';
$jsLinks = array($root . "js/colorMode.js");
include $root . 'fragments/endOfPage.php';
