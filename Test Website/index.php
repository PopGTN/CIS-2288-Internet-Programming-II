<?php
require_once 'Classes/CisUtil.class.php';
require_once 'Classes/FormBuilder.Bootstrap.class.php';
CisUtil::autoload("Classes");

$arry = [

    "test2" => "weqe",
    "test3" => "weqe",
    "test4" => "weqe",


];
$arry = [

    "test2",
    "test3",
    "test4",


];

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



$header = new Header(array("Hello world", "Welcome to my website"), array("height" => "400px"));


CisUtil::startPage("Test Website");
CisUtil::navbar();
?>

<?php $header->build() ?>
    <main class="main bg-white container">

        <div class="form-check form-switch">
            <label class="form-check-label" for="lightSwitch"> Dark Mode </label>
            <input class="form-check-input" type="checkbox" id="lightSwitch"/>
        </div>
        <a class="" href="#">About</a>

        <?= $form->build()?>

    </main>

<?php
CisUtil::footer();
CisUtil::endPage();
