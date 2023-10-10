<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    Procccess the form input from taxReturn.php and does the tax calucations and displays output.
-->

<?php
include_once 'util/CisUtil.php';

date_default_timezone_set('America/Halifax');
const TAX_PERCENTAGE = 0.18;
const EXEMPTION_NON_STUDENT = 16500;
const EXEMPTION_STUDENT = 23000;

$isValid = true;
// Credit for learning about this loop https://www.w3schools.com/php/php_arrays_associative.asp
foreach($_POST as $x => $x_value) {
    if (empty("$x_value")){
        $isValid = false;

   /*     echo '<script type="text/javascript">';
        echo 'alert("Error with '.$x.' ");';
        echo '</script>';*/
    }
}

if (isset($_POST['submit'])  && $isValid) {

    $title = CisUtil::cleanInputs($_POST["title"]);
    $fName = CisUtil::cleanInputs($_POST["fName"]);
    $lName = CisUtil::cleanInputs($_POST["lName"]);
    $address = CisUtil::cleanInputs($_POST['address']);
    $postalCode = CisUtil::cleanInputs($_POST["postalCode"]);
    $income = CisUtil::cleanInputs($_POST["income"]);
    $student = isset($_POST["student"]);

    $exemption = $student ? EXEMPTION_STUDENT : EXEMPTION_NON_STUDENT;

    if ($income > $exemption) {
        $taxableIncome = $income - $exemption;
        $tax = $taxableIncome * TAX_PERCENTAGE;
        $netIncome = $income - $tax;
    } else {
        $tax = 0;
        $netIncome = $income;
    }
    CisUtil::startPage("Tax Return Results");
    ?>
    <body>
    <main>
        <div class="main">
            <header>
                <h1>Tax Return Results</h1>
            </header>
            <div class="body">
                <p>Submit on <?php echo date('Y-m-d')." at ".date("g:i a"); ?>.</p>
                <p>Title: <?php echo $title; ?></p>
                <p>First Name: <?php echo $fName; ?></p>
                <p>Last Name: <?php echo $lName; ?></p>
                <p>Postal Code: <?php echo $postalCode; ?></p>
                <p>Address: <?php echo $address; ?></p>
                <p>Is a Student: <?php if(isset($_POST["student"])){echo "Yes";} else {echo "No";}?></p>
<!--                <p>Exception: $--><?php //echo number_format($exemption, 2); ?><!--</p>-->
                <p>Gross Income: $<?php echo number_format($income, 2); ?></p>
                <p>Tax Deducted: $<?php echo number_format($tax, 2); ?></p>
                <p>Net Income: $<?php echo number_format($netIncome, 2); ?></p>
                <a href="taxReturn.php" class="btn btn-primary">Back to the Form</a>
            </div>
        </div>
    </main>
    <?php
    CisUtil::endPage();
} else {
    CisUtil::startPage("Tax Return Results");
    ?>
    <main>
        <div class="main">
            <header>
                <h1>Tax Return Results</h1>
            </header>
            <div class="body">
                <p>Please finish filling out the form</p>
                <a href="taxReturn.php">Go back to the form</a>
            </div>
        </div>
    </main>
    <?php
    CisUtil::endPage();
}

?>