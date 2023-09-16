<!--
Author: Joshua Mckenna
Date: 2023/09/16
Class: CIS-2288
Description:
This php file is for the from on studentReg.html where
it submits the form and shows the information submitted
and does the math for the tution as well!
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holland College Student Registration</title>
</head>
<body>
<main style=" display: flex; justify-content: center; align-items: center; height: 100%;">
    <div style="width: 40%">
        <h1>Holland College</h1>
        <?php
        const COURSEPRICE = 800;
        //This is to check if the form was filled out or not. This is so there is no errors shown when the pages loads
        // if form is not filled out it will display a button to go back to the form to fill it out.
       /* if (isset($_POST["fName"])
            && isset($_POST["lName"])
            && isset($_POST['aName'])
            && isset($_POST['aNumber'])
            && isset($_POST['aPCode'])
            && isset($_POST['aCity'])
            && isset($_POST['aProvince'])
            && isset($_POST['pNumber'])
            && isset($_POST['semesters'])
            && isset($_POST['cPerSemester'])
            && isset($_POST['HCDeduction'])
            && isset($_POST['Scholarship'])
        ) {*/
            // Define variables and use htmlspecialchars to sanitize the input
            $fName = htmlspecialchars($_POST['fName']);
            $lName = htmlspecialchars($_POST['lName']);
            $aNumber = htmlspecialchars($_POST['aNumber']);
            $aName = htmlspecialchars($_POST['aName']);
            $aCity = htmlspecialchars($_POST['aCity']);
            $aProvince = htmlspecialchars($_POST['aProvince']);
            $aPCode = htmlspecialchars($_POST['aPCode']);
            $pNumber = htmlspecialchars($_POST['pNumber']);
            $semesters = htmlspecialchars($_POST['semesters']);
            $hcDeduction = htmlspecialchars($_POST['HCDeduction']);
            $cPerSemester = htmlspecialchars($_POST['cPerSemester']);
            $scholarship = htmlspecialchars($_POST['scholarship']);

            //https://sl.bing.net/f8s3KVxfGxg
            date_default_timezone_set('America/Halifax');
            echo '<h2>Student Registration</h2>';
            /* echo '<p> Student registered at '. date("g : i a, jS  F Y") .'</p>';*/
            echo '<p>Student registered at ' . date("G:i, jS  F Y") . '</p>';
            echo '<p>This student\'s name is: ' . $fName . ' ' . $lName . '</p>';
            echo '<p>The student\'s address is: ' . $aNumber . ' ' . $aName . ' ' . $aCity . ' ' . $aProvince . ' ' . $aPCode . '</p>';
            echo '<p>The student\'s phone number is: ' . $pNumber . '</p>';

            //The Variable to calculate the students tutions cost
            $tutionCost = COURSEPRICE * $cPerSemester * $semesters  - $hcDeduction - $scholarship;


            echo 'The Students tution cost is: '.$tutionCost.'. They are taking '.$cPerSemester.' a semester for '.$semesters.' semesters.';
             
            echo "<a href='studentReg.html'>Back to Form</a>";
/*} else {

            echo "<p>Please Go back to the Form and fill out everything!</p> <a href='studentReg.html'>Back to Form</a>";
            //include_once 'studentReg.html';
        }*/
        ?>
        <div>
</main>
</body>
</html>