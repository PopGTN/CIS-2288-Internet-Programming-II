<?php

require_once 'util/CisUtil.php';

CisUtil::startPage("Acme Accessories Inc.", '<link href="css/Custom.css" rel="stylesheet">');

CisUtil::navbar();
/*Image Credit
        https://www.apple.com/ca/newsroom/2023/09/apple-unveils-iphone-15-pro-and-iphone-15-pro-max/
        */

?>
</div>
<?php
CisUtil::header(array("Acme Accessory Sales","View Orders"), array("image" => 'photos/Header-Image.jpg','fontColor'=>'white', "height"=>'400px'));
?>
<form action="processOrder.php" method="post">
    <div class="bg-white container px-5 pt-5">
        <div class="px-3">
            <div class="col-2">
                <label class="form-label" for="name">Name <span style="color: red;">*</span></label>
                <input class="" id="name" name="name" type="text" value="Joshua">
            </div>
            <div class="col-2">
                <label class="form-label" for="phone">Phone Number <span style="color: red;">*</span></label>
                <input class="" id="phone" name="phone" type="tel" value="19027860920">
            </div>
            <div class="col-2">
                <label class="form-label" for="email">Email</label>
                <input class="" id="email" name="email" type="text" value="redbluegreen188@gmail.com">
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
                    <td><input name="iphone12" id="iphone12" type="number" value="0" min="0" max="30"></td>
                </tr>
                <tr>
                    <td><label class="form-label" for="iphone13">iPhone 13 case</label></td>
                    <td>$20.00</td>
                    <td><input name="iphone13" id="iphone13" type="number" value="0" min="0" max="30"></td>
                </tr>
                <tr>
                    <td><label class="form-label" for="samsung">Samsung Galaxy case</label></td>
                    <td>$17.50</td>
                    <td><input name="samsung" id="samsung" type="number" value="0" min="0" max="30"></td>
                </tr>
                <tr>
                    <td><label class="form-label" for="google">Google Pixel case</label></td>
                    <td>$16.50</td>
                    <td><input name="google" id="google" type="number" value="0" min="0" max="30"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container bg-white py-5 d-flex align-items-end flex-column">
        <input class="btn btn-primary me-5" type="submit" name="subsmit" value="Purchase">
    </div>
</form>
<main class="mainBody container fill-page bg-white ">
</main>


<?php

CisUtil::footer();
CisUtil::endPage();

?>
