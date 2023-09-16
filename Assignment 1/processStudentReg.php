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

if (isset($_POST["fName"])
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
) {
    echo '<h2 style="color: #69a45a">Submitted Successfully!!!</h2>';


} else {

    echo "<p>Please Go back to the Form and fill out everything!</p> <a href='studentReg.html'>Back to Form</a>";
    //include_once 'studentReg.html';
}
?>
<div>
</main>
</body>
</html>