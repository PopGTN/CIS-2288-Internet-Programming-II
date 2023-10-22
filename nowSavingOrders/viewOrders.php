<?php
// Author: Don Bowers
// Date: Oct 1, 2018
// Purpose: Display contents of a text file using fgets and feof

//create short variable name
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bob's Auto Parts - Customer Orders</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Orders</h2>
<?php
// store this in a variable in case we want to use it later - which we do
$pathToFile = $DOCUMENT_ROOT . "/../orders.txt";

// open the file
$fp = fopen($pathToFile, 'a+');

// if we can't find the file or it won't open, show a message
if (!$fp) {
    echo "<p><strong>Can't find the file. Sorry.</strong></p>";
    exit("</body></html>");
}

// check if the file is empty (no orders present)
if (filesize($pathToFile) == 0) {
    echo "<h4>Sorry, file is empty.</h4>";
} else {
    // if we do have the file and it is not empty, while it is not the end of the file (file end of file - feof)
    // so basically keep looking through the file until we are done ;)
    // Use fgets function to get each record up to the file pointer (which in our case is hopefully the end of the file, store it in the order variable and append a <br> so that each order is on a new line
    while (!feof($fp)) {
        $order = fgets($fp);
        echo $order . "<br>";
    }
}

// We don't have to do this, but it is helpful if we want to know the current position of the file pointer.
echo "Final position of the file pointer is " . (ftell($fp));
echo "<br>";
rewind($fp);
echo "After rewind, the position is " . (ftell($fp));
echo "<br>";

// close the file resource
fclose($fp);

?>
</body>
</html>
