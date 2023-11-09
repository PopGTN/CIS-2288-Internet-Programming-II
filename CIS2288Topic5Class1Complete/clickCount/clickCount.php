<?php
/*
Author: Don Bowers
Name: clickCount.php
Description:

Using the hidden field named clickCount,
we keep track of clickCount.
The first time the form loads, the user did
not click submit, thus we execute the else clause
of the select statement.  Thus we start with
$clickCount = 0, and we print that value in
the value attribute of the hidden field named clickCount.

If the form was submitted, the form input named
submit will exist, and we go ahead and extract
the clickCount variable from POST; increment it,
and then go ahead and print the form again with
the hidden field storing the incremented clickCount.
*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>Click Count</title>
</head>
<body>
<?php
/*How to pass query parameters from form's action attribute in php?
   Set form method=POST" to access a value passed using form's action attribute using $_GET, As for the other values, $_POST should be used.
    https://stackoverflow.com/questions/34289122/how-to-pass-query-parameters-from-forms-action-attribute-in-php*/

$clickCount = 0;

if (isset($_POST["submit"])) {
    $clickCount = intval($_GET['clickCount']);
    $clickCount += 1;
}

?>

<form method="POST"  action="<?php echo 'clickCount.php?clickCount=' . $clickCount ?>">
    <input type="submit" value="Click" name="submit"/>
</form>

<h3>You have submitted this form <?php echo $clickCount; ?> times.</h3>
</body>
</html>