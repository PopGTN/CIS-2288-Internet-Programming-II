<?php
require_once 'util/CisUtil.php';

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

$pathToFile = "$DOCUMENT_ROOT/../orders/caseOrders.txt";
$directory = "$DOCUMENT_ROOT/../orders/";
if (!is_dir($directory)) {
    mkdir($directory);
}
// open the file
$fp = fopen($pathToFile, 'w');

// if we can't find the file or it won't open, show a message
if (!$fp) {
    CisUtil::startPage();
    CisUtil::navbar();
    echo "<main>";
    echo "<p><strong>Can't find the file. Sorry.</strong></p>";
    echo "</main>";
    CisUtil::footer();
    CisUtil::endPage();
    exit();
}
CisUtil::startPage("Resetting File...", '<link href="css/Custom.css" rel="stylesheet">');
CisUtil::navbar();
?>
<main class="mainBody container fill-page bg-white ">
    <p>Go Back to View Orders Page by clicking this button → <a class='btn btn-outline-primary' href='orderForm.php'>Go Back</a></p>
</main>
<?php
CisUtil::footer();
CisUtil::endPage();
fclose($fp);

//header("Location: view.php");
?>
