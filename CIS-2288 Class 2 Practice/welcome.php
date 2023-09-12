<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if (isset($_POST["fName"])
    && isset($_POST["lName"])
    && isset($_POST['aName'])
    && isset($_POST['aNumber'])
    && isset($_POST['pNumber'])
) {
    echo '<form action="" method="POST">
    <table>
        <caption style="background-color: #cccccc"> Holland College Student Registration</caption>
        <tr>
            <td>First Name:</td>
            <td>'. htmlspecialchars($_POST['fName']).'</td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td>'. htmlspecialchars($_POST['lName']).'</td>
        </tr>
        <tr>
            <td>Address Street:</td>
            <td>'. htmlspecialchars($_POST['aName']).'</td>
        </tr>
        <tr>
            <td>Address Number:</td>
            <td>'. htmlspecialchars($_POST['aNumber']).'</td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td>'. htmlspecialchars($_POST['pNumber']).'</td>
        </tr>
    </table>
    ';
    echo '<h2 style="color: #69a45a">Submitted Successfully!!!</h2>';

} else {
    echo "<p>Please Go back to the Form and submit it with information</p> <a href='studentRegistration.html'>Back to Form</a>";


   // include_once 'form.php';


/*       echo '<form action="" method="POST">
    <table>
        <caption style="background-color: #cccccc"> Holland College Student Registration</caption>
        <tr>
            <td>First Name:</td>
            <td><input type="text" id="fName" name="fName" value="Joe"></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" id="lName" name="lName" value="Smith"></td>
        </tr>
        <tr>
            <td>Address Street:</td>
            <td><input type="text" id="aName" name="aName" value="Longworth Ave"></td>
        </tr>
        <tr>
            <td>Address Number:</td>
            <td><input type="text" id="aNumber" name="aNumber" value="33"></td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td><input type="text" id="pNumber" name="pNumber" value="555-111-4444"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Submit"></td>
        </tr>
    </table>
</form>';*/
}
?>
</body>
</html>