<?php
/*
 * Author: Donnie McKinnon
 * Date: 2021-09-08
 * Class: CIS2288
 * Description: Building Bob's website
 */

//declare constants
define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);
//create a flag to determine if the page should continue processing.
$processPage = True;

//build an error string to output if input is not correct.
$errorString = "";

//Retrieve data from POST
$tireQty = test_input($_POST['tireqty']);
$oilQty = test_input($_POST['oilqty']);
$sparkQty = test_input($_POST['sparkqty']);
$rimCost = test_input($_POST['rims']);


//$stringTest = test_input(" he\'llo ");
//echo $stringTest;

if(is_numeric($tireQty)==false)
{
       $errorString = $errorString . " The tire quantity is not numeric. ";
       $processPage = false;
}
if(is_numeric($oilQty)==false or empty($oilQty))
{
    $errorString = $errorString . " The oil quantity is empty or not numeric. ";
    $processPage = false;
}
if(is_numeric($sparkQty)==false or empty($sparkQty))
{
    $errorString = $errorString . " The spark quantity is empty or not numeric. ";
    $processPage = false;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order Results</h2>
    <?php
        //if any data is missing do not process the page.

        //if(strlen($errorString) > 0) #this is another option
        if($processPage==false)
        {
            echo $errorString;
        }
        else
        {
            //no errors process the page
            echo "<p>Order Processed. ";//Hello this is a comment
            echo date('H:i , jS F Y');
            echo"</p>";
            echo"<p>You order is the following:</p>";
            echo "The number of tires is: " . $tireQty . "<br>";
            echo "The amount of bottles of oil order is: " . ($oilQty) . "<br>";
            echo "The amount of spark plugs orders is: " . ($sparkQty) . "<br>";
            //echo "The rim type you selected costs: " . ($rimCost) . "<br>";
            //echo "The constant price of Oil is: " . OILPRICE . "<br>";

            //Playing around with data types
            /*$totalQty = 5.5;
            $totalAmount = (int)$totalQty;
            echo "Total qty is: " . $totalQty . "<br>";
            echo "Total amt is: " . $totalAmount . "<br>";
            //$totalQty = "hello";
            //$totalQty = True;
            */

            $totalQty = $tireQty + $oilQty + $sparkQty;
            echo "<p>Items ordered: " . $totalQty . "<br>";
            $totalAmount = $tireQty * TIREPRICE + $oilQty * OILPRICE + $sparkQty * SPARKPRICE;
            echo " Subtotal: $" . number_format($totalAmount, 2) . "<br>";

            $taxRate = 0.10; //local sales tax 10%
            $totalAmount = $totalAmount * (1 + $taxRate);
            echo "Total including tax: $" . number_format($totalAmount, 2) . "</p>";
        }

    ?>


</body>
</html>