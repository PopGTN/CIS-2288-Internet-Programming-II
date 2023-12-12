<?php

    // Updated by: Don Bowers,jdkitson
	// Date: November 22, 2019
    // Purpose: Demo DB and PHP inserting - updating with PHP
?>
<!doctype html>
<html>
    <head>
        <title>Book-O-Rama - Update</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div id="container">

    <h1>Book-O-Rama</h1>
       <!-- <p><a href="newBook.php">Add a new book</a> - <a href="inventory.php">View all Books</a></p>-->
        <?php
        if(isset($_POST['submit'])) {
            // create short variable names
            $bookId = $_POST['bookId'];
            $isbn = $_POST['isbn'];
            $author = $_POST['author'];
            $title = $_POST['title'];
            $price = $_POST['price'];

            if (empty($isbn) || empty($author) || empty($title) || empty($price)) {
                echo "You have not entered all the required details.<br />"
                    . "Please go back and try again.</body></html>";
                exit;
            }

            require("lib/config.php");
            //$bookId=$mysqli->real_escape_string($bookId);
            $isbn = $mysqli->real_escape_string($isbn);
            $author = $mysqli->real_escape_string($author);
            $title = $mysqli->real_escape_string($title);
            $price = $mysqli->real_escape_string(doubleval($price));

            // example UPDATE query
            $query = "UPDATE books SET isbn='$isbn', title='$title', author='$author', price=$price WHERE books.id=$bookId LIMIT 1";
            $result = $mysqli->query($query);

            if ($result) {
                echo $mysqli->affected_rows . " book updated in database. <a href='viewBooks.php'>View all Books</a>";
                //select book
                //Order Detail Report Query
                $query = "SELECT *
             FROM `books`
                where books.id=$bookId";


// Here we use our $db object created above and run the query() method. We pass it our query from above.
                $result = $mysqli->query($query);

                // Here we 'get' the num_rows attribute of our $result object - this is key to knowing if we should show the results or
// display an error message, or perhaps just to say we don't have any results.
                $num_results = $result->num_rows;

                //echo "<p>Total Results: $num_results</p>";

                if ($num_results > 0) {
                    //  $result->fetch_all(MYSQLI_ASSOC) returns a numeric array of all the books retrieved with the query
                    $books = $result->fetch_all(MYSQLI_ASSOC);

                    echo "<table class='table table-bordered'><tr>";
                    //This dynamically retieves header names
                    foreach ($books[0] as $k => $v) {
                        echo "<th>" . $k . "</th>";
                    }
                    echo "</tr>";
                    //Create a new row for each book
                    foreach ($books as $book) {
                        echo "<tr>";
                        foreach ($book as $k => $v) {
                            echo "<td>" . $v . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    // if no results
                    echo "<p>Sorry there are no entries in the database.</p>";
                }
                $result->free();
                $mysqli->close();

            } else {
                echo "An error has occurred.  The item was not updated.";
            }
        }else{
            header("location:viewBooks.php");
            exit();

        }
        ?>
    </div>
    </body>
</html>