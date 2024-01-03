<?php
/**
 * @author Joshua Mckena
 * @since 12/12/2023
 * Used to edit any Books
 */
//point this root variable should point to the root directory using a relative path
global $mysqli, $isLoggedIn;
$bookID = 0;
$isbn = "";
$author = "";
$title = "";
$price = "";
$isbnValidation = "";
$authorValidation = "";
$titleValidation = "";
$priceValidation = "";
$errorMessage = "";

$root = "../../";
require_once $root . 'lib/CisUtil.class.php';
include $root . 'lib/CheckCred.php';

//User Messages
//$message1 = "<div class='alert alert-success'>Edit Success <a href='index.php'>View All News</a></div>";
$messageQueryError = "<div class='alert alert-danger mt-3'>There was a problem with your query.</div>";
$messageEmptyInputError = "<div class='alert alert-danger mt-3'>One or more fields was empty.</div>";


if (isset($_POST['submit'])) {
    $isValid = true;
    $bookID = CisUtil::cleanInputs($_POST["id"]);
    $isbn = CisUtil::cleanInputs($_POST["isbn"]);
    $author = CisUtil::cleanInputs($_POST["author"]);
    $title = CisUtil::cleanInputs($_POST["title"]);
    $price = CisUtil::cleanInputs($_POST["price"]);
    require($root . "lib/config.php");

    //Checks if any of the fields are empty from Line 32 to 47
    if (empty($isbn)) {
        $isValid = false;
        $isbnValidation = "is-invalid";
    }
    if (empty($author)) {
        $isValid = false;
        $authorValidation = "is-invalid";
    }
    if (empty($title)) {
        $isValid = false;
        $titleValidation = "is-invalid";
    }
    if (empty($price)) {
        $isValid = false;
        $priceValidation = "is-invalid";
    }

    if ($isValid) {
        require($root . "lib/config.php");
        global $mysqli;
        $bookID = $mysqli->real_escape_string($bookID);
        $isbn = $mysqli->real_escape_string($isbn);
        $author = $mysqli->real_escape_string($author);
        $title = $mysqli->real_escape_string($title);
        $price = $mysqli->real_escape_string($price);


        $query = "UPDATE books SET isbn='$isbn', title='$title', author='$author', price=$price WHERE books.id=$bookID LIMIT 1";
        $result = $mysqli->query($query);
//        echo $result;
//        CisUtil::sendMessageBox($result);

        if ($result != 1) {
            echo $messageQueryError;

        } else {
            Header("Location: {$root}");
        }

//        $result->free();
        $result->free();
        $mysqli->close();


    } else {
        $errorMessage = $messageEmptyInputError;
    }

} else {
    $bookID = CisUtil::cleanInputs($_GET["id"]);

    require($root . "lib/config.php");
    $query = "SELECT * FROM books WHERE books.id={$bookID}";
//    echo $query;
    $result = $mysqli->query($query);
//        CisUtil::sendMessageBox($result);

    if ($result->num_rows == 1) {
//    echo  showError();
        $row = $result -> fetch_array(MYSQLI_ASSOC);
        $bookID = $row['id'];
        $isbn = $row['isbn'];;
        $author = $row['author'];;
        $title = $row['title'];;
        $price = $row['price'];;
    } else {
        showError();
    }

//        $result->free();
    $result->free();
    $mysqli->close();


}

//The Head and body
include $root . "fragments/startOfPage.php";
//The Navbar
include $root . "fragments/navbar.php";
?>
    <main id="main-container" class="container d-flex justify-content-center align-content-center flex-wrap">
        <div class=" bg-white shadow p-3 mb-5 bg-body-tertiary rounded"
             style="width: fit-content; height: fit-content;">

            <form class="" method="post">
                <div class="mb-5">
                    <h1 class="text-center fw-bold px-5">Edit a Book</h1>
                </div>
                <div class="mb-3 is-invalid">
                    <label for="id" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="id" name="id"
                           value="<?= $bookID ?>" readonly>
                </div>
                <div class="mb-3 is-invalid">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control <?= $isbnValidation ?>" id="isbn" name="isbn"
                           value="<?= $isbn ?>">
                    <div class="invalid-feedback">
                        Invalid ISBN
                    </div>
                </div>
                <div class="mb-3 is-invalid">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control <?= $authorValidation ?>" id="author" name="author"
                           value="<?= $author ?>">
                    <div class="invalid-feedback">
                        Invalid Author
                    </div>
                </div>
                <div class="mb-3 is-invalid">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control <?= $titleValidation ?>" id="title" name="title"
                           value="<?= $title ?>">
                    <div class="invalid-feedback">
                        Invalid Title
                    </div>
                </div>
                <div class="mb-3 is-invalid">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control <?= $priceValidation ?>" id="price" name="price"
                           value="<?= $price ?>">
                    <div class="invalid-feedback">
                        Invalid Price
                    </div>
                </div>
                <div class="mt-3">
                    <input type="submit" name="submit" value="Save Changes" class="btn btn-primary px-3 w-100">
                    <?= $errorMessage ?>
                </div>
            </form>
        </div>
    </main>
<?php


include $root . 'fragments/footer.php';
//Extra links. This makes Dark/light mode work
$jsLinks = array($root . "js/colorMode.js");
//Body closing tag and js scripts
include $root . 'fragments/endOfPage.php';

function showError($message = "No ID was chosen/Found please <a href=\"javascript:history.back()\">Go Back</a>"){
    $root = "../../";
    //The Head and body
    include $root . "fragments/startOfPage.php";
//The Navbar
    include $root . "fragments/navbar.php";
    echo "<main id='main' class='container'>";
    echo "<h1 class='display-1 text-danger'>ERROR!</h1>";
    echo "<div class='alert alert-danger mt-3'>{$message}</div>";
    echo "</main>";
    include $root . 'fragments/footer.php';
//Extra links. This makes Dark/light mode work
    $jsLinks = array($root . "js/colorMode.js");
//Body closing tag and js scripts
    include $root . 'fragments/endOfPage.php';
    exit();
}
