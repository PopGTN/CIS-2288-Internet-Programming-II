<?php
require_once 'util/CisUtil.php';
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
CisUtil::startPage("Acme Accessories Inc.", '<link href="css/Custom.css" rel="stylesheet">');
CisUtil::navbar();
?>
<?php
CisUtil::header(array("Acme Accessory Sales","View Orders"), array("image" => 'photos/Header-Image.jpg','fontColor'=>'white'));
?>
<main class="container fill-page bg-white ">
    <?php
    // store this in a variable in case we want to use it later - which we do
    $pathToFile = "$DOCUMENT_ROOT/../orders/caseOrders.txt";
    $directory = "$DOCUMENT_ROOT/../orders/";
    if (!is_dir($directory)) {
        mkdir($directory);
    }
    // open the file
    $fp = fopen($pathToFile, 'r');

    // if we can't find the file or it won't open, show a message
    if (!$fp) {
        echo "<p><strong>Can't find the file. Sorry.</strong></p>";
        exit("</body></html>");
    }

    // check if the file is empty (no orders present)
    if (filesize($pathToFile) == 0) {
        echo "<h4 class='py-2 px-2'>Sorry, file is empty.</h4>";
    } else {
        while (!feof($fp)) {
            $order = fgets($fp);
            echo $order . "<br>";
        }
    }

    // close the file resource
    fclose($fp);

    ?>
</main>
<?php
CisUtil::footer();
CisUtil::endPage();
?>

<?php

