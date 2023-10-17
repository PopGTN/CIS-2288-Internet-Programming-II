<?php
require_once 'util/CisUtil.php';

CisUtil::startPage("Acme Accessories Inc.", '<link href="css/Custom.css" rel="stylesheet">');
CisUtil::navbar();
CisUtil::header("View Orders", array('fontColour'=>'','txtClasses' => 'mb-3 border-bottom border-2 border-black display-4'));
?>
<main class="container fill-page bg-white ">

</main>
<?php
CisUtil::footer();
CisUtil::endPage();
?>

<?php
