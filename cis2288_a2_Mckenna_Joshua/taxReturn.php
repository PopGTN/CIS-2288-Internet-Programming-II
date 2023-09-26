<!DOCTYPE html>
<html>
<head>
    <title>2023 PEI Income Tax Return Form</title>
    <?php include_once 'css/style.php' ?>
</head>

<body>

    <main>
        <header>
            <h1>2023 PEI Income Tax Return Form</h1>
        </header>
        <form action="processTaxReturn.php" method="post">
            <label for="title">Title:</label>
            <select id="title" name="title">
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <!-- Add more options as needed -->
            </select><br/>
            <label for="fname">First Name:</label><br/>
            <input type="text" id="fname" name="fname"><br/>
            <!-- Repeat for last name, postal code, and address -->
            <label for="income">Gross Income:</label><br/>
            <input type="number" id="income" name="income"><br/>
            <input type="checkbox" id="student" name="student">
            <label for="student">Full-time student</label><br/>
            <input type="submit" value="Submit" name="submit">
        </form>
    </main>
</body>
</html>
