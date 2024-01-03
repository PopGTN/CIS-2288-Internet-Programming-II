<?php
global $mysqli, $isLoggedIn;
session_start();
require_once 'lib/CisUtil.class.php';
CisUtil::autoload("lib");

$cssLinks = array("css/bootstrap.css", "css/Custom-Bootstrap-Util.css", "css/root.css", "css/Custom.css");
include 'fragments/startOfPage.php';
include "fragments/navbar.php";
?>

<?php

$username = isset($_SESSION['username']) ? "Welcome ".$_SESSION['username']  : "";
/*Header*/
$header = new Header(array("CIS Book Inventory", $username), array("height" => "200px", "textAlign", "classes" => "container"));
$header->build()
?>

    <main id="main" class="container">
        <div class="pt-3">
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
            if (isset($_GET['msg'])) {
                echo "<p>{$_GET['msg']}</p>";
            }

            echo "<table class='table table-bordered table-striped '>";
            echo "<thead>";
            if ($num_results > 0) {
//  $result->fetch_all(MYSQLI_ASSOC) returns a numeric array of all the books retrieved with the query
                $books = $result->fetch_all(MYSQLI_ASSOC);
//            echo "<table class='table table-bordered'><tr>";
//This dynamically retieves header names
                foreach ($books[0] as $k => $v) {

                    echo "<th>" . CisUtil::caseSpaceString($k)  . "</th>";

                }
                if ($isLoggedIn) {
                    echo "<th>Action</th>";
                }
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
                        if (($i == count($book) - 1) && $isLoggedIn) {
                            echo "<td>";
                            echo "<div class='btn-toolbar'>";
                            echo "<a href='book/edit?id=" . $bookId . "' title='Edit Record' class='text-primary' data-toggle='tooltip'><i class=\"bi bi-pencil-square\"></i></a>";
                            echo '<div class="vr d-none d-lg-flex mx-lg-2"></div>';
                            echo "<a href='book/delete?id=" . $bookId . "' title='Delete Record' class='text-primary' data-toggle='tooltip'><i class=\"bi bi-trash\"></i></a>";
                            echo "</div>";
                            echo "</td>";
                        }
                        $i++;
                    }
                    echo "</tr>";

                }

                if ($isLoggedIn) {
                    echo "<tr><td colspan='6'>";
                    echo "<a href='book/add' title='View Record' class='btn btn-primary float-end' data-toggle='tooltip'><i class=\"bi bi-plus-lg\"></i>Add Book</a>";
                    echo "</td></tr>";

                }
                echo "</tbody>";
                echo "</table>";
                echo "<div class='d-flex center'>";
                echo "<p class='form-control d-inline-block w-auto'>Number of books found: " . $num_results . "</p>";
                echo "</div>";
            }
            // free result and disconnect
            $result->free();
            $mysqli->close();

            ?>
        </div>
    </main>
<?php

include 'fragments/footer.php';
$jsLinks = array("js/colorMode.js");
include 'fragments/endOfPage.php';
