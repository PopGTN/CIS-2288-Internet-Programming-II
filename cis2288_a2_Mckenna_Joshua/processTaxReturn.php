<?php
include_once 'util/CisUtil.php';

const TAX_PERCENTAGE = 0.18;
const EXEMPTION_NON_STUDENT = 16500;
const EXEMPTION_STUDENT = 23000;

if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $fname = $_POST["fName"];
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
    CisUtil::startPage("Tax Return Results");
    ?>
    <body>
    <main>
        <div class="main">
            <header>
                <h1>Tax Return Results</h1>
            </header>
            <div class="body">
                <p>Title: <?php echo $title; ?></p>
                <p>First Name: <?php echo $fname; ?></p>
                <!-- Repeat for last name, postal code, and address -->
                <p>Gross Income: $<?php echo number_format($income, 2); ?></p>
                <p>Tax Deducted: $<?php echo number_format($tax, 2); ?></p>
                <p>Net Income: $<?php echo number_format($netIncome, 2); ?></p>
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