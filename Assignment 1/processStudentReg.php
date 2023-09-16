<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holland College Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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