<?php
// Include config file


$bookId = "";
$msg="";
// Process delete operation after confirmation
if (isset($_GET["bookId"]) && !empty($_GET["bookId"])){
    //Create DB conection object
    require_once("lib/config.php");
    //Sanitize the parameter
    $bookId = $mysqli->real_escape_string($_GET['bookId']);
    // Prepare a delete statement
    if ($stmt = $mysqli->prepare("DELETE FROM books WHERE books.id = ?")) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $bookId);

        //Set parameter and execute
        $bookId = $mysqli->real_escape_string($_GET["bookId"]);
         // Attempt to execute the prepared statement
        if ($stmt->execute()) {

            // Close statement
            $stmt->close();

            $msg= "Book ".$bookId." deleted";
            // Records deleted successfully. Redirect to landing page
            header("location: viewBooks.php?msg=".$msg);
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
// Close connection
    $mysqli->close();

} else{

  $msg = "Deletion Error" ;}
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

    <p class="error"><?php echo $msg ?></p>

</div>
</body>
</html>
