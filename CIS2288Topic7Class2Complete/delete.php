<?php
// Include config file

require_once("lib/config.php");
$bookId = "";
$msg = "";
// Process delete operation after confirmation
if (isset($_GET["bookId"]) && !empty($_GET["bookId"])) {
    //Sanitize the parameter
    $bookId = $mysqli->real_escape_string($_GET['bookId']);
    // example UPDATE query
    $query = "DELETE FROM books WHERE books.id =$bookId ";
    $result = $mysqli->query($query);

    if ($result) {
        $msg = "Record deleted successfully. ".$mysqli->affected_rows . " book deleted from database. <a href='viewBooks.php'>View all Books</a>";

    } else {
        $msg = "Error deleting record: " . $mysqli->error;
    }

    $mysqli->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <h2>CIS Book Inventory</h2>
    <p class="error"><?php echo $msg ?></p>

</div>
</body>
</html>
