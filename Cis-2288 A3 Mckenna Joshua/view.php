<!--
Author: Joshua Mckenna
Date: 2024/10/22
Description:
    This webpage is so that you can view the orders that were made throughout the day.
-->
<?php
require_once 'util/CisUtil.php';
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
const PRODUCTS = array("iPhone 12 Case(s)", "iPhone 13 Case(s)", "Samsung Galaxy Case(s)", "Google Pixel Case(s)");

CisUtil::startPage("Acme Accessories Inc.", '<link href="css/Custom.css" rel="stylesheet">');
CisUtil::navbar();
?>
<?php
CisUtil::header(array("Acme Accessory Sales", "View Orders"), array("image" => 'photos/Header-Image.jpg', 'fontColor' => 'white'));
?>

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
    echo '<main class="container fill-page bg-white ">';
    echo "<p><strong>Can't find the file. Sorry.</strong></p>";
    echo '</main>';

} else if (filesize($pathToFile) == 0) {
    echo '<main class="container fill-page bg-white ">';
    echo "<h4 class='py-2 px-2'>Sorry, file is empty.</h4>";
    echo '</main>';
}
else {

    ?>
    <main class="container fill-page bg-white ">
    <div>
    <div class="container-fluid col-11 overflow-auto">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <?php foreach (PRODUCTS as $product) { ?>
                <th scope="col"><?= $product ?></th>
            <?php } ?>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Total</th>
        </tr>

        </thead>
        <tbody>
        <?php
        $count = 1;
        while (!feof($fp)) {
            $order = fgets($fp);
            $orderListItems = explode("\t", $order);

            if (!empty($order)) { ?>
                <tr>
                <th class="row"><?= $count ?></th>
            <?php }

            for ($i = 0; $i < count($orderListItems); $i++) {
                if ($i <= 3 || $i <= (2 + count(PRODUCTS))) {
                    $productQTY = explode(" ", $orderListItems[$i])
                    ?>
                    <td><?= $productQTY[0] ?></td>
                    <?php
                } else { ?>
                    <td><?= $orderListItems[$i] ?></td>
                <?php }
            }
            ?></tr><?php
            $count++;
        } ?>
        </tbody>
    </table>
        <a class='btn btn-outline-primary'
           href='resetFile.php'>Reset Orders</a></p>
    </div>
    </div>

    <?php
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

