<?php
require_once 'util/CisUtil.php';

CisUtil::startPage("Acme Accessories Inc.", '<link href="css/Custom.css" rel="stylesheet">');
CisUtil::navbar();
CisUtil::header(array("View Orders","Here you can view your orders. Here you can view your orders. Here you can view your orders"), array('fontColour'=>'black', 'titleClasses' => 'display-4 mx-auto'));
?>
<main class="container fill-page bg-white ">

</main>
<?php
CisUtil::footer();
CisUtil::endPage();
?>

<?php
