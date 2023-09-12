<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Form HTML</title>
</head>
<body>
<h1>Bob's Auto parts</h1>
<h2>Order Output</h2>
<?php

echo "<p> Processed order: <br>". date("g : i, jS  F Y") ."</p>";
echo "<p> Tire QTY " . htmlspecialchars( $_POST["TiresQty"]) . "</p>";
echo "<p> Oil QTY " . htmlspecialchars($_POST["OilQty"]) . "</p>";
echo "<p> Sparks QTY " . htmlspecialchars($_POST["SparkQty"]) . "</p>";
?>


<?php

// Declare variable and initialize it
$var = "Geeks";

// Reference variable
${$var}="GeeksforGeeks";

// Use double reference variable
${${$var}}="computer science";

// Display the value of variable
echo $var . "<br>";
echo $Geeks . "<br>";
echo $GeeksforGeeks . "<br>";

// Double reference
echo ${${$var}}. "<br>";

?>

</body>
</html>