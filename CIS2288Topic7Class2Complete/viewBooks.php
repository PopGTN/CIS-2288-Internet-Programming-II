<?php
// Updated by: Don Bowers,jdkitson
// Date: November 22, 2019
// Purpose: Demo DB and PHP inserting - updating with PHP

?>
<!doctype html>
<html>
<head>
    <title>Book-O-Rama Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <?php
    // set up connection
    require("lib/config.php");

    //Sort type
    $sort = " order by books.title asc";

    //Display book inventory
    $query = "SELECT id,isbn,author,title,price FROM books";

    // Here we use our $db object created above and run the query() method. We pass it our query from above.
    $result = $mysqli->query($query);

    $num_results = $result->num_rows;
    if(isset($_GET['msg'])) {
        echo "<p>{$_GET['msg']}</p>";
    }
    echo "<p>Number of books found: " . $num_results . "</p>";
    echo "<h2>CIS Book Inventory</h2>";
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead>";
    if ($num_results > 0) {
//  $result->fetch_all(MYSQLI_ASSOC) returns a numeric array of all the books retrieved with the query
        $books = $result->fetch_all(MYSQLI_ASSOC);
        echo "<table class='table table-bordered'><tr>";
//This dynamically retieves header names
        foreach ($books[0] as $k => $v) {

                echo "<th>" . $k . "</th>";

        }

            echo "<th>Action</th>";

        echo "</tr></thead>";
        echo "<tbody>";
//Create a new row for each book
        foreach ($books as $book) {
            echo "<tr>";
            $i = 0;

            foreach ($book as $k => $v) {

                if ($k == 'id') {
                    echo "<td>" . $v . "</td>";
                    $bookId = $v;
                } else {
                    echo "<td>" . $v . "</td>";
                }
                    if (($i == count($book) - 1)) {
                    echo "<td>";
                    echo "<div class='btn-toolbar'>";
                   echo "<a href='editBook.php?bookId=" . $bookId . "' title='Edit Record' class='btn btn-info btn-xs' data-toggle='tooltip'>Edit</a>";
                        echo "<a href='delete.php?bookId=" . $bookId . "' title='Delete Record' class='btn btn-info btn-xs' data-toggle='tooltip'>Delete</a>";
                       echo "</div>";
                        echo "</td>";
                }
                $i++;
            }
            echo "</tr>";

        }

            echo "<tr><td colspan='6'>";
            echo "<a href='newBook.php' title='View Record' class='btn btn-info' data-toggle='tooltip'>Add a New Book</a>";
            echo "</td></tr>";

        echo "</tbody>";
        echo "</table>";
    }
    // free result and disconnect
    $result->free();
    $mysqli->close();

    ?>
</div>
</body>
</html>
