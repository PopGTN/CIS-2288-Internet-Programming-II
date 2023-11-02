<?php
require_once 'CisUtil.class.php';
CisUtil::autoload();

$header = new Header("Hello world", array("height"=>"158px"));

CisUtil::startPage("Test Website");
CisUtil::navbar();
?>

<?php $header->build()  ?>
<main class="main container bg-white">




</main>
<?php
CisUtil::footer();
CisUtil::endPage();
