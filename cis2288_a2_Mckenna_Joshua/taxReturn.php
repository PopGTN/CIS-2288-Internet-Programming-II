<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    Main page of this assignment as for the information and posts it to prroccessTaxReturn.phpl
-->
<?php
include_once 'util/CisUtil.php';
include_once 'util/FormBuilder.php'
?>
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

                $formBuilder->addLabel("lName", "Last Name:");
                $formBuilder->addInput("text", "lName");


                $formBuilder->addCustomHTML('</td></tr> <tr><td>');

                $formBuilder->addLabel("address", "Address: ");
                $formBuilder->addInput("text", "address");


                $formBuilder->addCustomHTML('</td><td>');

                $formBuilder->addLabel("postalCode", "Postal Code:");
                $formBuilder->addInput("text", "postalCode");

                $formBuilder->addCustomHTML('</td></tr> <tr><td>');

                $formBuilder->addLabel("income", "Gross Income:");
                $formBuilder->addInput("number", "income");

                $formBuilder->addCustomHTML('</td></tr> <tr><td></td><td>');
                $formBuilder->addCustomHTML('</td></tr> <tr><td>');

                //Turns off auto line breaker
                $formBuilder->setDoeslinebreaks(false);

                $formBuilder->addLabel("student", "Are you a student?");
                $formBuilder->addInput("checkbox","student","student");

                $formBuilder->addCustomHTML('</td></tr> <tr><td></td><td>');


                $formBuilder->addInput("submit", "submit","Submit", 'class="btn btn-primary"');

                $formBuilder->addCustomHTML('</td><td>');


                echo $formBuilder->build();

                ?>

            </div>
        </div>
    </main>
    <!--</body>
    </html>-->
<?php CisUtil::endPage(); ?>