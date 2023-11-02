<!--* User: jdkitson
* Date: 10/01/2019
* Time: 9:24 AM
* Purpose: CIS-2288 Assignment 3 - Room Booking - Form-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HR System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
<div id="employeeForm">

    <div id="mainHeadings">
        <h2>ACME International</h2>
        <h4>Employee System</h4>

        <!--<div id="photo">

            <img src="img/produce.jpg" class="img-responsive center-block img-rounded" alt="Cottage" height="225"
                 width="300"/></div>-->
    </div>
    <form class="orderForm" action="processEmployee.php" method="post">
        <div class="form-group">
            <label for="empFirstName">First Name:</label>
            <input type="text" class="form-control" id="empFirstName" placeholder="Enter first name" name="empFirstName">
        </div>
        <div class="form-group">
            <label for="empLastName">Last Name:</label>
            <input type="text" class="form-control" id="empLastName" placeholder="Enter last name" name="empLastName">
        </div>
        <div class="form-group">
            <label for="empSalary">Salary:</label>
            <input type="empSalary" class="form-control" id="empSalary" placeholder="Enter salary" name="empSalary">
        </div>
        <div class="form-group">
            <label for="empTerritory">Territory:</label>
            <input type="empTerritory" class="form-control" id="empTerritory" placeholder="Enter territory" name="empTerritory">
        </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </div>
    </form>
</div>
</body>
</html>

