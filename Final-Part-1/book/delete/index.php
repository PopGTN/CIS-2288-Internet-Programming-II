<?php
//session_start();
//point this root variable should point to the root directory using a relative path
/**
 * @author Joshua Mckena, Donnie McKinnon
 * @since 12/12/2023
 * Used to delete books
 */
global $mysqli;
$root = "../../";
require_once $root.'lib/CisUtil.class.php';
require_once $root.'lib/Header.class.php';
require_once $root.'lib/CheckCred.php';

$bookId = "";
$msg="";
// Process delete operation after confirmation
if (isset($_GET["id"]) && !empty($_GET["id"])){
    //Create DB conection object
    require_once($root."lib/config.php");
    //Sanitize the parameter
    $bookId = $mysqli->real_escape_string($_GET['id']);
    // example UPDATE query
    $query = "DELETE FROM books WHERE books.id =$bookId ";
    $result = $mysqli->query($query);

    if ($result) {
        $msg = "Record deleted successfully. ".$mysqli->affected_rows . " book deleted from database. <a href='viewBooks.php'>View all Books</a>";
        Header("Location: $root");

    } else {
        $msg = "Error deleting record: " . $mysqli->error;
    }

    $mysqli->close();


} else{

    $msg = "Deletion Error" ;
}

?>

<?php
//The Head and body
include $root . "fragments/startOfPage.php";
//The Navbar
include $root . "fragments/navbar.php";
/*Header*/
$header = new Header(array("Template Page", "Copy this page's code to get started"), array("height" => "158px", "textAlign","classes"=>"container"));
$header->build()
?>

    <main id="main" class="container px-5 py-3">
        <p class="error"><?php echo $msg ?></p>
    </main>
<?php


include $root .'fragments/footer.php';
//Extra links. This makes Dark/light mode work
$jsLinks = array($root ."js/colorMode.js");
//Body closing tag and js scripts
include $root .'fragments/endOfPage.php';


