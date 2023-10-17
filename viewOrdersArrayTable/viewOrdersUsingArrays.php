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
			$pathToFile = $DOCUMENT_ROOT."/../orders.txt";

			// check if the file is empty (no orders present)
           if (filesize($pathToFile)==0 && file_exists($pathToFile)) {
			   	echo "<h4>Sorry, file is empty.</h4>";
           } else {
           		// file() reads entire file into an array - no need for fopen or fclose if we use this method
			   $myFileArray = file($pathToFile);
			   // use var_dump to explore the contents, notice that each position in the array is a record
				//var_dump($myFileArray);

			   // now that we have an array, we can use a foreach to look through each line and extract whatever we want
			   // here, $orderRecord represents each record in the orders file
               echo "<table>";
               echo "<tr>";
               echo "<th>Date</th>";
               echo "<th>Month</th>";
               echo "<th>Day</th>";
               echo "<th>Cost</th>";
               echo "<th>Address</th>";
               echo "</tr>";
				foreach ($myFileArray as $orderRecord) {
					// this will output each record as a string
					//echo $orderRecord."<br>";
					// to split each piece of the string we need to use explode()
					// $orderPieces will become an array, as explode() returns an array - have to read the php.net for that
					$orderPieces = explode("\t",$orderRecord);
					//var_dump($orderPieces); #for debugging
                    //start table row
                    echo "<tr>";
					// now we have access to print each piece of the data as we wish (in any order we wish
					//echo "<span style='color:red;'>".$orderPieces[0]. "</span> ". $orderPieces[1].", ".$orderPieces[2]." - ". $orderPieces[7]. " - " . $orderPieces[8] ."<br>";
					//add each piece of data to table row data
                    echo "<td>" . $orderPieces[0] . "</td>";
                    echo "<td>" . $orderPieces[1]. "</td>";
                    echo "<td>" . $orderPieces[2] . "</td>";
                    echo "<td>" . $orderPieces[7] . "</td>";
                    echo "<td>" .$orderPieces[8] . "</td>";
					echo "</tr>";

				}
				echo "</table>";
           }

        ?>
    </body>
</html>
