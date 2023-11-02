<?php
//require_once('Employee.class.class.class.php');
//require_once('Employee.class.classWithTerritory.php');

// An anonymous function as of PHP 5.3.0
//Loads all classes
spl_autoload_register(function ($class) {
    //include 'classes/' . $class . '.class.php';
    //include $class . '.php';
    include 'classes/' .$class . '.class.php';
});

//Includes user-defined functions
require_once('utilities.php');


if (isset($_POST['submit'])) { ?>

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
    $empTerritory = test_input($_POST['empTerritory']);


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

// Create the appropriate Employee.class.class type based on the state of $empTerritory
        if(empty($empTerritory)) {
            $emp1 = new Employee($empLastName,$empFirstName, $empSalary);
        }else{

            $emp1 = new EmployeeWithTerritory($empLastName,$empFirstName, $empSalary,$empTerritory);
        }

        ?>

        <h1>HR System</h1>
        <h2>Employee Info</h2>
        <p>Processed at <?php echo $dateString ?></p>

        <!--Display using getters/setters-->

        <p>Employee ID:<?php echo $emp1->getEmpNum() ?> <br/>
        <!-- Retrieve empFirsName using __get()  -->
        Employee Name:<?php echo $emp1->empFirstName . " " . $emp1->getEmpLastName() ?> <br/>
        Employee Salary:<?php echo number_format($emp1->getEmpSalary(), 2) ?> <br/>
        <!-- Display Employee.class.class Territory based on the state of $empTerritory-->
        <?php echo (!empty($empTerritory) ? "Employee.class Territory: ".$emp1->territory:""); ?> </p>

        <!--Call toString-->
        <?php echo $emp1 ?>


       <!-- <p><a href='viewOrders.php'>View all orders</a></p>-->

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
    header("Location: orderVegetables.php");

}
?>


