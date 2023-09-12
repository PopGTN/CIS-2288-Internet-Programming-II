<!DOCTYPE html>
<?php
/*
Author: Donnie McKinnon
Class: CIS-2288
Date: September 7 2021
Description: Building the processing order page for Bobs auto part website. This page retrieves the data
            from the html order form and uses the POST array to get the data assign to variables and display.
*/
//create short variable names
$tireQty = $_POST['tireqty'];
$oilQty = $_POST['oilqty'];
$sparkQty = $_POST['sparkqty'];

?>
<html>
<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>
    <body>
        <h1>Bob's Auto Parts</h1>
        <h2>Order Results</h2>
        <?php
            echo "<p>Order processed at ";
            echo date('H:i, jS F Y');
            echo "</p>";
            echo htmlspecialchars($tireQty).' tires.<br>';
            echo htmlspecialchars($oilQty).' bottles of oil.<br>';
            echo htmlspecialchars($sparkQty).' spark plugs.<br>';
        ?>
    </body>
</html>
