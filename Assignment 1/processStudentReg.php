<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holland College Student Registration</title>
</head>
<body>
<?php

if (isset($_POST["fName"])
    && isset($_POST["lName"])
    && isset($_POST['aName'])
    && isset($_POST['aNumber'])
    && isset($_POST['aPCode'])
    && isset($_POST['pNumber'])
) {
    echo '<h2 style="color: #69a45a">Submitted Successfully!!!</h2>';


} else {

    echo "<p>Please Go back to the Form and submit it with information</p> <a href='studentReg.html'>Back to Form</a>";
    //include_once 'studentReg.html';
}
?>
</body>
</html>