<!--
Author: Joshua Mckenna
Date: 2024/10/22
Description:
    This page proccess orders and writes them to file.
-->

<?php
require_once 'util/CisUtil.php';

const ITEM_PRICES = array('iphone12' => 15.50, "iphone13" => 20.00, "samsung" => 17.50, "google" => 16.50);

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

const FREE_SHIPPING = 65;
const SHIPPING_COST = 5;
const PROVINCIAL_TAX_RATE = 0.15;


CisUtil::startPage("Acme Accessory Sales", '<link href="css/Custom.css" rel="stylesheet">');
CisUtil::navbar();
CisUtil::header(array("Acme Accessory Sales", "Proccess Order"), array("image" => 'photos/Header-Image.jpg', 'fontColor' => 'white', "height" => '400px'));
?>
    <div>
        <?php
        if (isset($_POST['submit'])) { ?>
            <main class="container  bg-white px-5 py-5 fill-page">
                <p>You must enter fill out the form before submitting<a class='btn btn-outline-primary' href='orderForm.php'>Try again</a></p>
            </main>
            <?php CisUtil::footer() ?>
            <?php CisUtil::endPage() ?>
            <?php
            exit;
        }

        if (empty($_POST['name'])) { ?>
            <main class="container  bg-white px-5 py-5 fill-page">
                <p>You must enter a name. <a class='btn btn-outline-primary' href='orderForm.php'>Try again</a></p>"

            </main>
            <?php CisUtil::footer() ?>
            <?php CisUtil::endPage() ?>
            <?php
            exit;
        }
        if (empty($_POST['phone'])) { ?>
            <main class="container  bg-white px-5 py-5 fill-page">
                <p>You must enter a phone number. <a class='btn btn-outline-primary' href='orderForm.php'>Try again</a>
                </p>

            </main>
            <?php CisUtil::footer() ?>
            <?php CisUtil::endPage() ?>
            <?php
            exit;
        }

        //Make sure they are not all empty else the order will not be placed
        if (empty($_POST['samsung']) && empty($_POST['iphone12']) && empty($_POST['iphone13']) && empty($_POST['google'])) { ?>

            <main class="container  bg-white px-5 py-5 fill-page">

                <p>You must order something. <a class='btn btn-outline-primary' href='orderForm.php'>Try again</a></p>
            </main>
            <?php CisUtil::footer() ?>
            <?php CisUtil::endPage() ?>
            <?php
            exit;
        }
        //Loops throu all the QTY of all the items and makes sure they are in the range of of (0 - 30)
        //else they will have to go back to the form. You also asked for this to be a requirment.
        foreach (ITEM_PRICES as $item => $price) {
            if ($_POST[$item] < 0 || $_POST[$item] > 30) { ?>
                <main class="container  bg-white px-5 py-5 fill-page">
                    <p>You can't Order a quantity out of the range 0 - 30 <a class='btn btn-outline-primary'
                                                                             href='orderForm.php'>Try again</a></p>
                </main>
                <?php CisUtil::footer() ?>
                <?php CisUtil::endPage() ?>
                <?php
                exit;
            }
        }
        date_default_timezone_set('America/Halifax'); // Set timezone to ADT
        $date = date('n/j/Y'); // Get date in the format of m/d/Y
        $time = date('g:ia'); // Get time in the format of h:mma

        $totalCost = 0;
        //The Array that will be saveed to the file
        $writeToFileArray = array($_POST['name'], $_POST['phone'], $_POST['email']);

        //Loops throught all the input boxs and add to the array that will be save to the file.
        foreach (ITEM_PRICES as $item => $price) {
            if (!empty($_POST[$item])) {
                $totalCost += round(($_POST[$item] * $price), 0);
            } else {

            }
            //Selects the product  that its proccessing and writes it the file.
            switch ($item) {
                case "samsung":
                    $writeToFileArray[count($writeToFileArray)] = CisUtil::cleanInputs($_POST[$item]) . " Samsung Galaxy";
                    break;
                case "google":
                    $writeToFileArray[count($writeToFileArray)] = CisUtil::cleanInputs($_POST[$item]) . " Google Pixel";
                    break;
                case "iphone12":
                    $writeToFileArray[count($writeToFileArray)] = CisUtil::cleanInputs($_POST[$item]) . " iPhone 12";
                    break;
                case "iphone13":
                    $writeToFileArray[count($writeToFileArray)] = CisUtil::cleanInputs($_POST[$item]) . " iPhone 13";
                    break;
            }

        }
        // Check the shipping cost.
        $shipping = '';
        if ($totalCost >= FREE_SHIPPING) {
            $shipping = 'Free'; // This will be display later on
        } else {
            $shipping = CisUtil::dollarMoneyFormate(SHIPPING_COST);
            $totalCost += SHIPPING_COST;
        }
        $subTotal = $totalCost;
        $tax = ($totalCost * PROVINCIAL_TAX_RATE);
        $totalCost += $tax;


        $writeToFileArray[count($writeToFileArray)] = $date;
        $writeToFileArray[count($writeToFileArray)] = $time;
        $writeToFileArray[count($writeToFileArray)] = "$" . number_format($totalCost, 2, '.', ',');
        ?>

        <div class="bg-white container px-5 pt-5">
            <div class="px-3">
                <div class="col-lg-3 col-12">
                    <label class="form-label" for="name">Name</label>
                </div>
                <div class="col-lg-3 col-12">
                    <input class="container-fluid" id="name" name="name" type="text"
                           value="<?= CisUtil::cleanInputs($_POST['name']) ?>" disabled>
                </div>
                <div class="col-lg-3 col-12">
                    <label class="form-label" for="phone">Phone Number</label>
                </div>
                <div class="col-lg-3 col-12">
                    <input class="container-fluid" id="phone" name="phone" type="tel"
                           value="<?= CisUtil::cleanInputs($_POST['phone']) ?>" disabled>
                </div>
                <div class="col-lg-3 col-12">
                    <label class="form-label" for="email">Email</label>
                </div>
                <div class="col-lg-3 col-12">
                    <input class="container-fluid" id="email" name="email" type="text"
                           value="<?= CisUtil::cleanInputs($_POST['email']) ?>" disabled>
                </div>
            </div>

        </div>
        <div class="container bg-white py-5 ">
            <div class="col-11">
                <table class="table container my-0 mx-5">
                    <thead class="table-primary">
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Price</th>
                        <th scope="col">QTY</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><label class="form-label" for="iphone12">iPhone 12 case</label></td>
                        <td>$15.50</td>
                        <td><input name="iphone12" id="iphone12" type="number"
                                   value="<?= CisUtil::cleanInputs($_POST['iphone12']) ?>" min="0"
                                   max="30" disabled></td>
                    </tr>
                    <tr>
                        <td><label class="form-label" for="iphone13">iPhone 13 case</label></td>
                        <td>$20.00</td>
                        <td><input name="iphone13" id="iphone13" type="number"
                                   value="<?= CisUtil::cleanInputs($_POST['iphone13']) ?>" min="0"
                                   max="30" disabled></td>
                    </tr>
                    <tr>
                        <td><label class="form-label" for="samsung">Samsung Galaxy case</label></td>
                        <td>$17.50</td>
                        <td><input name="samsung" id="samsung" type="number"
                                   value="<?= CisUtil::cleanInputs($_POST['samsung']) ?>" min="0"
                                   max="30" disabled></td>
                    </tr>
                    <tr>
                        <td><label class="form-label" for="google">Google Pixel case</label></td>
                        <td>$16.50</td>
                        <td><input name="google" id="google" type="number"
                                   value="<?= CisUtil::cleanInputs($_POST['google']) ?>" min="0" max="30"
                                   disabled></td>
                    </tr>
                    </tbody>
                </table>
                <?php echo "<p class='px-5 pt-2'><b>Shipping Cost: </b>" . $shipping . "</p>" ?>
                <?php echo "<p class='px-5 '><b>Subtotal: </b>" . CisUtil::dollarMoneyFormate($subTotal) . "</p>" ?>
                <?php echo "<p class='px-5 '><b>Tax: </b>" . CisUtil::dollarMoneyFormate($tax) . "</p>" ?>
                <?php echo "<p class='px-5'><b>Total: </b>" . CisUtil::dollarMoneyFormate($totalCost) . "</p>" ?>
            </div>
        </div>
        <div class="container bg-white d-flex align-items-start flex-column">
            <h6 class="mx-5" style="color: limegreen">Successfully placed Order at <?= $time ?> on <?= $date ?>!</h6>

        </div>
    </div>

    <main class="container  bg-white px-5 py-5">

    </main>
<?php


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
                    Please try again later.</strong> <a class='btn btn-outline-primary' href='orderForm.php'>Try again</a></p></body></html>";
    fclose($fp);
    exit;
}
$outputString = implode("\t", $writeToFileArray) . "\r\n";

fwrite($fp, $outputString, strlen($outputString));
flock($fp, LOCK_UN);
fclose($fp);

CisUtil::footer();
CisUtil::endPage();

