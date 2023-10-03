<?php
    // Author:
	// Date: Oct 1, 2018
    // Purpose: process orders from orderform page - store in  text file
    // Requirements: This script requires a directory called 'orders' be created behind the document root directory, see the note
    // below about security.

    // Because we want to store our text file in a 'safe, non-public' area, we find out where the root of the web server is
    // serving from - then go one directory back from that (see line 109 - ../ means one directory behind. If we
    // put our text file here, no one on the web can read or access it directly = better security.
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    $date = date('h:i, jS F Y');
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
            //Here we can use empty to ensure that they order at least one thing
            if ( empty($_POST['tireQty']) && empty($_POST['oilQty']) && empty($_POST['sparkQty'])) {

                echo "<p>You must order something. <a href='orderForm.php'>Try again</a></p></body></html>";
                //exit the script without executing anything else
                exit;
            }

            // create short variable names
            $tireQty = htmlspecialchars($_POST['tireQty']);
            $oilQty = htmlspecialchars($_POST['oilQty']);
            $sparkQty = htmlspecialchars($_POST['sparkQty']);
            $address = htmlspecialchars($_POST['address']);
            date_default_timezone_set("America/Halifax");

            //set up an 'error switch' and set it to no error
            $hasInputError = false; #boolean

            // The following code checks to ensure that the user types a number in the box.
            if (!is_numeric($tireQty) && !$tireQty=="") {
                echo "<p>Enter a numeric value for tire quantity</p>";
                $hasInputError = true;
            }
            //use the is_numeric built in method
            if (!is_numeric($oilQty) && (!$oilQty== "")) {
                // if tire text field contains
                echo "<p>Enter a numeric value for oil quantity</p>";
                $hasInputError = true;
            }
            //use the is_numeric built in method
            if (!is_numeric($sparkQty) && (!$sparkQty== "")) {
                // if tire text field contains
                echo "<p>Enter a numeric value for spark quantity</p>";
                $hasInputError = true;
            }

            //if they have an input error,give them the link to go back and try again
            if ( $hasInputError == true ) {
                echo "<a href=\"orderform.php\">Try again</a></body></html>";
                exit;
            }

            // Note that all code from this point will execute only if there are no errors above. See the exit

			// set date for order record in file
			$time = date('h:ia');
			$month =  date('F');
			$day =  date('j');
			$year = date('Y');

            //display order details
            echo "<p>Your order is as follows: </p>";

            $totalQty = 0;
            $totalQty = $tireQty + $oilQty + $sparkQty;

            echo "<p>Items ordered: ".$totalQty."</p>";

            $totalAmount = 0.00;

            define('TIREPRICE', 100);
            define('OILPRICE', 10);
            define('SPARKPRICE', 4);
            define('TAXRATE', .10);

            $totalAmount = $tireQty * TIREPRICE
                + $oilQty * OILPRICE
                + $sparkQty * SPARKPRICE;

            echo "<p>Subtotal: $".number_format($totalAmount,2)."</p>";

            $totalAmount = $totalAmount * (1 + TAXRATE);
            echo "<p>Total including tax: $".number_format($totalAmount,2)."</p>";

            // begin piecing together our string to save in our text file
            // note that we use \r\n to get our new line to work in Windows Notepad
            // some text software require both, others may work with just \n
            // for compatibility just use both \r\n
            $outputString = $time."\t".$month."\t".$day."\t".$year."\t".$tireQty." tires \t".$oilQty." oil\t"
                            .$sparkQty." spark plugs\t\$".$totalAmount
                            ."\t". $address."\r\n";

            // open file for writing 'w'
            // see more options here - http://www.php.net/manual/en/function.fopen.php
            // from php.net -> w mode: Open for writing only; place the file pointer at the beginning of the file and truncate the               file to zero length. If the file does not exist, attempt to create it. Try the option of a+ to append more data the file.
            // append mode might be best :)
            $fp = fopen("$DOCUMENT_ROOT/../orders.txt", 'a+');

            flock($fp, LOCK_EX);

            if (!$fp) {
              echo "<p><strong> Your order could not be processed at this time.
                    Please try again later.</strong></p></body></html>";
              exit;
            }

            fwrite($fp, $outputString, strlen($outputString));
            flock($fp, LOCK_UN);
            fclose($fp);

			//echo when the order was processed
			echo "<p>Order processed at ".date('h:ia \o\n F jS, Y')."</p>";
            echo "<p><a href='viewOrders.php'>View all orders</a> now?</p>";
        ?>
    </body>
</html>
