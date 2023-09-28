<?php
include_once 'util/CisUtil.php';
include_once 'util/FormBuilder.php'
?>

    <!--<!DOCTYPE html>
<html>
<head>
    <title>2023 PEI Income Tax Return Form</title>
    <?php /*include_once 'css/style.php'; */ ?>
</head>-->
<?php CisUtil::startPage('2023 PEI Income Tax Return Form'); ?>
    <main>
        <div class="main">
            <header>
                <h1>2023 PEI Income Tax Return Form</h1>
            </header>
            <div class="body">
                <?php
                $titles = array(
                    "Mr.",
                    "Mrs.",
                    "Ms",
                    "Dr",
                    "Capt",
                    "Prof",
                    "Rev",
                    "Sir",
                    "Madam"
                );

                $formBuilder = new FormBuilder("processTaxReturn.php", "post", true);

                //on First Column on first row
                $formBuilder->addCustomHTML("<table class='taxForm'><tr><td>");
                $formBuilder->addLabel('title', "Title:");
                $formBuilder->addSelect('title', $titles);

                //First Column on second row
                $formBuilder->addCustomHTML("</td></tr><tr><td>");

                $formBuilder->addLabel("fName", "First Name: ");
                $formBuilder->addInput("text", "fName");

                $formBuilder->addCustomHTML('</td><td>');

                $formBuilder->addLabel("lName", "Last Name Name:");
                $formBuilder->addInput("text", "lName");


                $formBuilder->addCustomHTML('</td></tr> <tr><td>');

                $formBuilder->addLabel("address", "Address: ");
                $formBuilder->addInput("address", "address");


                $formBuilder->addCustomHTML('</td><td>');

                $formBuilder->addLabel("postalCode", "Postal Code:");
                $formBuilder->addInput("postalCode", "postalCode");

                $formBuilder->addCustomHTML('</td></tr> <tr><td>');


                $formBuilder->addCustomHTML('</td><td>');

                echo $formBuilder->build();

                ?>
                <!-- Repeat for last name, postal code, and address -->


            </div>
        </div>
    </main>
    <!--</body>
    </html>-->
<?php CisUtil::endPage(); ?>