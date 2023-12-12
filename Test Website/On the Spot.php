<?php
require_once 'Classes/CisUtil.class.php';
require_once 'Classes/FormBuilder.Bootstrap.class.php';
CisUtil::autoload("Classes");

$form = new BSFormBuilder("", "post",array("bootstrap" => false));

$form->row();
$form->addLabel("fName", "First Name");
$form->addInput("text", "fName");
$form->addLabel("lName", "Last Name");
$form->addInput("text", "lName");
$form->row();
$form->addLabel("lName", "Last Name");
$form->addCheckBox("1", "test", "test", "test");
$form->addCheckBox("1", "test2", "test2", "test2");
$form->div();
$form->addLabel("test", "testdddl");
$form->addInput("text", "lName");



$header = new Header(array("On The Spot"), array("height" => "200px"));


CisUtil::startPage("Test Website");
CisUtil::navbar();
?>

<?php $header->build() ?>
    <main class="main bg-white container">



    </main>

<?php
CisUtil::footer();
CisUtil::endPage();
