<?php
require_once 'Classes/CisUtil.class.php';
require_once 'Classes/FormBuilder.Bootstrap.class.php';
CisUtil::autoload("Classes");


$header = new Header(array("Hello world","Welcome to my website"), array("height" => "400px"));


CisUtil::startPage("Test Website");
CisUtil::navbar();
?>

<?php $header->build() ?>
    <main class="main bg-white container">
        <div>
            <?php $hello = new BSFormBuilder() ?>
        </div>

        <div class="form-check form-switch">
            <label class="form-check-label" for="lightSwitch"> Dark Mode </label>
            <input class="form-check-input" type="checkbox" id="lightSwitch" />
        </div>

        <script src="js/switch.js"></script>
    </main>

<?php
CisUtil::footer();
CisUtil::endPage();
