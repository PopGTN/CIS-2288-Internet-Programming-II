<?php
require_once 'util/CisUtil.php';

const ITEM_PRICES = array('iphone12' => 15.50, "iphone13" => 20.00, "samsung" => 17.50, "google" => 16.50);

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

CisUtil::startPage("Acme Accessory Sales", '<link href="css/Custom.css" rel="stylesheet">');
CisUtil::navbar();
CisUtil::header(array("Acme Accessory Sales", "View Orders"), array("image" => 'photos/Header-Image.jpg', 'fontColor' => 'white'));
?>
    <main class="container  bg-white px-5 py-5">
        <?php
        if (empty($_POST['name'])) {

            echo "<p>You must enter a name. <a class='btn btn-outline-primary' href='orderForm.php'>Try again</a></p></body></html>";
            exit;
        }
        if (empty($_POST['phone'])) {

            echo "<p>You must enter a phone number. <a class='btn btn-outline-primary' href='orderForm.php'>Try again</a></p></body></html>";
            exit;
        }
        if (empty($_POST['iphone12']) && empty($_POST['iphone13']) && empty($_POST['samsung']) && empty($_POST['google'])) {

            echo "<p>You must order something. <a class='btn btn-outline-primary' href='orderForm.php'>Try again</a></p></body></html>";
            exit;
        }


        date_default_timezone_set('America/Halifax'); // Set timezone to ADT
        $date = date('n/j/Y'); // Get date in the format of m/d/Y
        $time = date('g:ia'); // Get time in the format of h:mma

        $totalCost = 0;
        $writeToFileArray = array($_POST['name'], $_POST['phone'], $_POST['email']);
        foreach (ITEM_PRICES as $item => $price) {
            if (!empty($_POST[$item])) {
                $totalCost += round(($_POST[$item] * $price), 0);
            } else {

            }
            switch ($item) {
                case "samsung":
                    $writeToFileArray[count($writeToFileArray)] = $_POST[$item] . " Samsung Galaxy";
                    break;
                case "google":
                    $writeToFileArray[count($writeToFileArray)] = $_POST[$item] . " Google Pixel";
                    break;
                case "iphone12":
                    $writeToFileArray[count($writeToFileArray)] = $_POST[$item] . " iPhone 12";
                    break;
                case "iphone13":
                    $writeToFileArray[count($writeToFileArray)] = $_POST[$item] . " iPhone 13";
                    break;
            }

        }
        $writeToFileArray[count($writeToFileArray)] = $date;
        $writeToFileArray[count($writeToFileArray)] = $time;
        $writeToFileArray[count($writeToFileArray)] = "$".number_format($totalCost, 2, '.', ',');

        foreach ($writeToFileArray as $item) {
            echo $item . "<br>";
        }

        echo "<p>Total: $" . number_format($totalCost, 2, '.', ',') . "</p>";

        $pathToFile = "$DOCUMENT_ROOT/../orders/caseOrders.txt";
        $directory = "$DOCUMENT_ROOT/../orders/";
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        // open the file
        $fp = fopen($pathToFile, 'a+');
        flock($fp, LOCK_EX);

        if (!$fp) {
            echo "<p><strong> Your order could not be processed at this time.
                    Please try again later.</strong></p></body></html>";
            fclose($fp);
            exit;
        }
        $outputString = implode("\t",$writeToFileArray) . "\r\n";

        fwrite($fp, $outputString, strlen($outputString));
        flock($fp, LOCK_UN);
        fclose($fp);


        ?>
    </main>
<?php
CisUtil::footer();
CisUtil::endPage();


