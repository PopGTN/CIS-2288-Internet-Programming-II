<?php
const TAX_PERCENTAGE = 0.18;
const EXEMPTION_NON_STUDENT = 16500;
const EXEMPTION_STUDENT = 23000;

if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $fname = $_POST["fname"];
// Repeat for last name, postal code, and address
    $income = $_POST["income"];
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
// Now you can echo out the results in a user-friendly format.
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Tax Return Results</title>
        <?php include_once 'css/style.php' ?>
    </head>
    <body>
    <main>
        <header>
            <h1>Tax Return Results</h1>
        </header>
        <p>Title: <?php echo $title; ?></p>
        <p>First Name: <?php echo $fname; ?></p>
        <!-- Repeat for last name, postal code, and address -->
        <p>Gross Income: $<?php echo number_format($income, 2); ?></p>
        <p>Tax Deducted: $<?php echo number_format($tax, 2); ?></p>
        <p>Net Income: $<?php echo number_format($netIncome, 2); ?></p>
    </main>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Tax Return Results</title>
        <?php include_once 'css/style.php' ?>
    </head>
    <body>
    <main>
        <header>
            <h1>Tax Return Results</h1>
        </header>
        <p>Please finish filling out the form</p>
        <a href="taxReturn.php">Go back to the form</a>
    </main>
    </body>
    </html>
    <?php
}

?>