<?php
/*
 * Author: jdkitson
 * Purpose: Generate random number in PHP and allow user to guess
 * Using the Session.
 *
 * */
//The session_start() function must be the very first thing in your document. Before any HTML tags.
// Start the session
session_start();

//Initialize variables
$gameComplete = false;
$numTries = 0;
$msg = "";
///////////////////////////////////////////////////////////////////////////////
// IF THEY CLICKED SUBMIT
if (isset($_POST['submit'])) {

    //Set values from the form
    $numTries = intval($_SESSION["numTries"]);
    $guess = empty($_POST['guess']) || !is_numeric($_POST['guess']) ? "": intval($_POST['guess']);
    $secret = intval($_SESSION["secret"]);




    // if they didn't guess anything show error
    if (($_POST['guess']) == "") {

        $msg .=  "<br/><span style='color:red; font-weight:bold;'>You must enter a number to guess</span><br />";


    } else {
        // numTries - add 1
        $numTries++;
        // now I need to compare their guess to the secret number that I stored in the form
        // if they match - echo out success or failure
        if ($guess == $secret) {
            $gameComplete = true;
            $msg = "<p>You got it!</p>";

            // Remove all of the session variables.
            session_unset();

            // Delete the session cookie.
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Destroy the session.
            //session_regenerate_id();
            session_destroy();

        } else if ($numTries < 5) {
            $msg = "<p>Sorry that wasn't it - Try again</p>";
            // Set session variable

        } else {
            $gameComplete = true;
            $msg .= "<br/>You have reached max number of guesses. The correct answer is " . $secret . "<br/>";
        }
        //Update session
        $_SESSION["numTries"] = $numTries;
    }
    ///////////////////////////////////////////////////////////////////////////////
    // THIS IS THEIR FIRST TIME LOADING THE PAGE
} else {
    // on first load I need to choose a random number and store it in the hidden field in the form
    // this is the first time they loaded the form
    // if (is_null($numTries) == 0) {
    $randNum = rand(1, 10);

    // Set session variable
    $_SESSION["secret"] = $randNum;
    $_SESSION["numTries"] = $numTries;

    // echo "Ok Shhhh! secret number is: " . $randNum . "<br />";
    $msg .=  "<p>Ok I'm thinking of a number between 1 and 10</p>";
    //   }
    // on first load set hidden numTries field in form to zero
    //$numTries = 0;

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Random Number</title>
    <script>
        function setFocus() {
            document.getElementById("guessBox").focus();
        }
    </script>
</head>
<body onload="setFocus()">
<h2>Guessing Game</h2>
<?php

//Results output
echo (isset($numTries) && $numTries > 0) ? "Number of Guesses: " . $numTries : "";
echo isset($guess) ? "<br/> Your Guess: " . $guess : "";
echo isset($msg) ? $msg : "";


if (!$gameComplete) {

    ?>

    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        What is your guess? <input type="text" name="guess" id="guessBox" value=""/><br/>
        <input type='submit' name='submit'/>
        <input type="hidden" name="secret" value="<?php echo $_SESSION["secret"] ?>"/>
    </form>
<?php } else {

    echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Play Again</a>";
}
?>
</body>
</html>