<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    Main page of this assignment as for the information and posts it to prroccessTaxReturn.phpl
-->
<?php
include_once 'util/CisUtil.php';
?>
<?php CisUtil::startPage('2023 PEI Income Tax Return Form'); ?>
<main>
    <div class="main">
        <header>
            <h1>2023 PEI Income Tax Return Form</h1>
        </header>
        <div class="body">
            <form action='processTaxReturn.php' method='post'>
                <table class='taxForm'>
                    <tr>
                        <td><label for='title'>Title:</label><br><select id="title" name="title">
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms">Ms</option>
                                <option value="Dr">Dr</option>
                                <option value="Capt">Capt</option>
                                <option value="Prof">Prof</option>
                                <option value="Rev">Rev</option>
                                <option value="Sir">Sir</option>
                                <option value="Madam">Madam</option>
                            </select> <br></td>
                    </tr>
                    <tr>
                        <td><label for='fName'>First Name: </label><br><input type='text' id='fName' name='fName'
                                                                              value=''><br></td>
                        <td><label for='lName'>Last Name:</label><br><input type='text' id='lName' name='lName'
                                                                            value=''><br></td>
                    </tr>
                    <tr>
                        <td><label for='address'>Address: </label><br><input type='text' id='address' name='address'
                                                                             value=''><br></td>
                        <td><label for='postalCode'>Postal Code:</label><br><input type='text' id='postalCode'
                                                                                   name='postalCode' value=''><br></td>
                    </tr>
                    <tr>
                        <td><label for='income'>Gross Income:</label><br><input type='number' id='income' name='income'
                                                                                value=''><br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for='student'>Are you a student?</label> <input type='checkbox' id='student'
                                                                                   name='student' value='student'></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' id='submit' name='submit' value='Submit' class="btn btn-primary"></td>
                        <td>
            </form>

        </div>
    </div>
</main>
<!--</body>
</html>-->
<?php CisUtil::endPage(); ?>