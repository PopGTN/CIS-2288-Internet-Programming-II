<?php
//point this root variable should point to the root directory using a relative path
$root = "";
require_once $root.'util/CisUtil.class.php';
require_once $root.'util/Header.class.php';

$bodyClasses = '';
$cssLinks = array("css/bootstrap.css", "css/Custom-Bootstrap-Util.css", "css/root.css", "css/Custom.css");
//The Head and body
include $root . "fragments/startOfPage.php";
//The Navbar
include $root . "fragments/navbar.php";
?>

<?php
/*Header*/
$header = new Header(array("Template Page", "Copy this page's code to get started"), array("height" => "158px", "textAlign","classes"=>"container"));
$header->build()
?>

    <main id="main" class="container px-5 py-3">
        <article class="document-strict mx-auto">
            <h2>Template Page</h2>
            <p>Style too own civil out along. Perfectly offending attempted add arranging age gentleman concluded. Get
                who
                uncommonly our expression ten increasing considered occasional travelling. Ever read tell year give may
                men
                call its. Piqued son turned fat income played end wicket. To do noisy downs round an happy books.</p>
            <p>Written enquire painful ye to offices forming it. Then so does over sent dull on. Likewise offended
                humoured
                mrs fat trifling answered. On ye position greatest so desirous. So wound stood guest weeks no terms up
                ought. By so these am so rapid blush songs begin. Nor but mean time one over.</p>
            <p>Old unsatiable our now but considered travelling impression. In excuse hardly summer in basket misery. By
                rent an part need. At wrong of of water those linen. Needed oppose seemed how all. Very mrs shed shew
                gave
                you. Oh shutters do removing reserved wandered an. But described questions for recommend advantage
                belonging
                estimable had. Pianoforte reasonable as so am inhabiting. Chatty design remark and his abroad figure but
                its.</p>
        </article>
    </main>
<?php


include $root .'fragments/footer.php';
//Extra links. This makes Dark/light mode work
$jsLinks = array($root ."js/colorMode.js");
//Body closing tag and js scripts
include $root .'fragments/endOfPage.php';

