<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";


//To remove all global session variables and destroy the session, use session_unset() and session_destroy()
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

</body>
</html>