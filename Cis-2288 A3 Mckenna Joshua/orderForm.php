<?php

require_once 'util/CisUtil.php';
require_once 'util/FormBuilder.php';

CisUtil::startPage("Acme Accessories Inc.", '<link href="css/Custom.css" rel="stylesheet">');

CisUtil::navbar();        /*Image Credit
        https://www.apple.com/ca/newsroom/2023/09/apple-unveils-iphone-15-pro-and-iphone-15-pro-max/
        */
?>
<div


    class="bg-image container container-center"
    style="

        background-image: url('photos/Header-Image.jpg');
        height: 200px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;

    "
>

    <div class="text-white">
        <h1 class="mb-3 border-bottom border-2 border-white display-4">Acme Accessories</h1>
    </div>

</div>
<div class="container fill-page bg-white">

    <?php
    $form = new FormBuilder("processOrder.php")


    ?>

</div>


<?php

CisUtil::footer();
CisUtil::endPage('<script src="js/BootstrapForm.js"</script>');

?>
