<?php

// Date: Nov 17, 2019
// Last Edit Author: jdkitson
// Purpose: Demonstrate how to search a mySQL database with PHP

?>
<!doctype html>
<html>
<head>
    <title>Add New Book Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <h1>Book-O-Rama - New Book Entry</h1>
       <div class="newBook-form">
        <form action="addBook.php" method="post">
            <fieldset  class="scheduler-border">
                <legend  class="scheduler-border">Book-O-Rama - New Book Entry</legend>
           <?php
            $msg = "";

            if (isset($_GET["error"])) {

                if($_GET["error"] == 'empty') {

                    $msg = "You have not entered all the required details.";
                }else if($_GET["error"] == 'db') {

                    $msg = "DB error.Book not added.";
                }else if($_GET["error"] == 'noform') {

                    $msg = "You must fill out a new book form.";
                }

              }
            echo "<p class='error'>$msg</p>";
              ?>

                <div class="form-group">
                    <label for="isbn">ISBN (format 0-672-31509-2):</label>
                    <input type="text" class="form-control" id="isbn" placeholder="Enter book isbn" name="isbn">
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" id="author" placeholder="Enter book author" name="author">
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter book title" name="title">
                </div>
                <div class="form-group">
                    <label for="price">Price $</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter book price" name="price">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add book</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>