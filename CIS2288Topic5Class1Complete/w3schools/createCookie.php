<?php
$cookie_name = "user";
$cookie_value = "";
$msg = "";
/*
 * setcookie() defines a cookie to be sent along with the rest of the HTTP headers.
 * Like other headers, cookies must be sent before any output from your script
 * (this is a protocol restriction). This requires that you place calls to this function
 * prior to any output, including <html> and <head> tags as well as any whitespace
 *
 * source:https://www.php.net/manual/en/function.setcookie.php
 *
 * time()+60*60*24*30 will set the cookie to expire in 30 days.
 * If set to 0, or omitted, the cookie will expire at the end of the session (when the browser closes).
 *
 * */
if (isset($_POST['submit'])) {
    if(empty($_POST['cookieValue'])) {
        //Delete cookies
    //To delete a cookie, you must issue it again and set a date in the past.
        setcookie($cookie_name, '', time() - 3600, "/");
        setcookie("cookie[one]", "", time() - 3600);
        setcookie("cookie[two]", "", time() - 3600);
        setcookie("cookie[three]", "", time() - 3600);
     $msg = "<p>Field is empty. Cookies are deleted. Try reloading</p>";
    }else{
        $cookie_value = $_POST['cookieValue'];
        setcookie($cookie_name, $cookie_value, time() + 60 * 60 * 24 * 30, "/");
       //$msg = "Cookie ".$cookie_name." set to ".$cookie_value."<br/>";
        // You may also set array cookies by using array notation in the cookie name
        setcookie("cookie[one]", "cookieone");
        setcookie("cookie[two]", "cookietwo");
        setcookie("cookie[three]", "cookiethree");

    }
}
// Set path to '/', the cookie will be available within the entire domain
?>
<!DOCTYPE html>
<html>
<body>

<?php
echo $msg;
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!<br/>";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name]."<br/>";
}
// after the page reloads, print them out
if (isset($_COOKIE['cookie'])) {
    echo "Cookie associative array named  'cookie' is set <br/>";
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name : $value <br />\n";
    }
}else{

    echo "Cookie associative array named  'cookie' is not set <br/>";
}
?>
<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
    <input type="text" name="cookieValue" value="<?php echo empty($_COOKIE[$cookie_name])? "":$_COOKIE[$cookie_name] ?>"/>
    <input type='submit' name='submit' />

   </form>


<p><strong>Note:</strong> You might have to reload the page to see the new value of the cookie.</p>

</body>
</html>
