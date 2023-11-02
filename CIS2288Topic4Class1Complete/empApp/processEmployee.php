<?php
require_once('Employee.php');

//Includes user-defined functions
require_once('utilities.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//if (isset($_POST['submit'])) {
    ?>

    <!--    HTML document header section-->

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>HR System - Employee Info</title>
        <style>

            body {
                background-color: #9acfea; /* The page background will be cornflowerblue */

            }

            .error {

                color: red;
                font-size: 20px;
            }
        </style>
    </head>
    <body>

    <?php

    // create short variable names

    //Set using method=POST
    $empFirstName = test_input($_POST['empFirstName']);
    $empLastName = test_input($_POST['empLastName']);
    $empSalary = (double)test_input($_POST['empSalary']);


    //set up an 'error switch' and set it by default to no error
    $hasInputError = false; //boolean
    $errorStr = "";

    //Validate required fields

    if (empty($empFirstName)) {

        $errorStr = "<p>Please enter a valid first name.</p>";

        $hasInputError = true;
    }

    if (empty($empLastName)) {

        if (empty($errorStr)) {

            $errorStr = "<p>Please enter a valid last name.</p>";
        } else {

            $errorStr = $errorStr . "<p>Please enter a valid last name.</p>";
        }

        $hasInputError = true;
    }

    if (empty($empSalary) || !is_numeric($empSalary)) {

        if (empty($errorStr)) {

            $errorStr = "<p>Please enter a valid salary.</p>";
        } else {

            $errorStr = $errorStr . "<p>Please enter a valid salary.</p>";
        }
        $hasInputError = true;
    }


    //if they have an input error,give them the link to go back and try again
    if ($hasInputError) { ?>

        <h1>HR System</h1>
        <h2>Processing Error(s)</h2>
        <div class="error"><?php echo $errorStr ?></div>
        <p><a href='employeeForm.php'>Try again</a></p>

        <?php
    } else {

        /* *******************************************

            Note that all code from this point will execute only if there are no errors above. See the exit

           ********************************************
        */
        //Set time zone for the page
        $date = date_create("now", timezone_open("America/Halifax"));
        $dateString = date_format($date, "Y/m/d H:iP");


        $emp1 = new Employee($empLastName, $empFirstName, $empSalary);


        /*   ************** Start Topic 3 Class 1 file() functions ***************** */

        /*
                // set date for order record in file
                $time = date('h:ia');
                $month = date('F');
                $day = date('j');
                $year = date('Y');


                /* Begin piecing together our string to save in our text file.
                Different operating system families have different line-ending conventions.
                Unix based systems use \n as the line ending character, Windows based systems
                use \r\n as the line ending characters and Macintosh based systems use \r as the line ending character.
                For compatibility just use both \r\n
                */

        /* $outputString = $name . "\t".$email . "\t".$phone . "\t" . $month . "\t" . $day . "\t" . $year . "\t" . $numPotatoes . " X 5 lbs Potatoes \t"
             . $numCarrots . " X 3 lbs Potatoes\t". $numCauliflower . " X Cauliflower\t\$" . $totalAmount. " Shipping Cost\t\$" .$shippingCharge. "\r\n";*/


        /* Because we want to store our text file in a 'safe, non-public' area, we find out where the root of the web server is
         serving from - then go one directory back from that (see line 190 - ../ means one directory behind. If we
         put our text file here, no one on the web can read or access it directly = better security.

         store this in a variable in case we want to use it later - which we does*/

        //Define path to file
        // $pathToFile = $_SERVER['DOCUMENT_ROOT'] . "/../orders.txt";


        /*  fopen function — Opens file or URL
        'w' - Open for writing only; place the file pointer at the beginning of the file and truncate
         the file to zero length. If the file does not exist, attempt to create it.
          see more options here - http://www.php.net/manual/en/function.fopen.php from php.net:
          w mode: Open for writing only; place the file pointer at the beginning of the file and truncate the
          file to zero length. If the file does not exist, attempt to create it.
        Try the option of 'a+' to append more data the file. Append mode might be best :)*/

        //Open for reading and writing. Append to existing text.
        //$fp = fopen($pathToFile, 'a+');

        //Error handing - https://stackoverflow.com/questions/24753821/php-fopen-error-handling
        // if we can't find the file or it won't open, show a message

        //fopen function returns a file pointer resource on success, or FALSE on failure
        //file_exists function - Returns TRUE if the file or directory specified by filename exists; FALSE otherwise.


        //    if (!file_exists($pathToFile) || !$fp) { ?>

        <!--<h1>ACME International</h1>
        <h2>Order Results</h2>

        <p><strong> Your order could not be processed at this time.<br>
                Please try again later.</strong></p>
-->
        <?php
// } else {


        //Lock file for writing
        //flock($fp, LOCK_EX);

        //Write formatted output string to the designated file
        //fwrite($fp, $outputString, strlen($outputString));

        //Unlock the file after writing is complete
        // flock($fp, LOCK_UN);

        /*
         The fclose() function in PHP is an inbuilt function which is used to close a file which
        is pointed by an open file pointer. The fclose() function returns true on success and false
        on failure. It takes the file as an argument which has to be closed and closes that file.

        */
        //Close the file after writing is complete
        // fclose($fp);

        ?>

        <h1>HR System</h1>
        <h2>Employee Info</h2>
        <p>Processed at <?php echo $dateString ?></p>

        <!-- Set a non-existing property "territory" using the __set() magic method-->
        <?php $emp1->territory = "Montague";?>

        <!-- Use Getters for output -->
        <?php echo "<p>Employee Number:  " . $emp1->empNum
            . "<br />Employee Name:  " . $emp1->empFirstName . " " . $emp1->empLastName
             . "<br />Territory:  " . $emp1->territory
            . "<br />Salary:  " . number_format($emp1->empSalary, 2) . "</p>" ?>

        <!-- Invoke the toString() for output -->

        <?php echo $emp1 ?>


        <p><a href='viewOrders.php'>View all orders</a></p>

        <?php
    }

    //}


    /*   ************** End Topic 3 Class 1 file() functions ***************** */

    ?>
    <!--    HTML document footer section-->
    </body>
    </html>
    <?php
} else {
    //Do a redirect
    header("Location: employeeForm.php");

}
?>


