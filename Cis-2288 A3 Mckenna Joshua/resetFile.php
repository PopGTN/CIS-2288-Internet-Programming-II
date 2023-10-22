<?php
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

fclose($fp);
header("Location: view.php");
?>
