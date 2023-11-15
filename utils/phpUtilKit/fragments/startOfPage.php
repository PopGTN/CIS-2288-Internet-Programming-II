<?php
global $bodyAttributes, $pageTitle, $bodyClasses, $headHtml, $csslinks;
$pageTitle = isset($pageTitle) ? $pageTitle : "My Website";
$bodyClasses = isset($bodyClasses) ? $bodyClasses : "";
$headHtml = isset($headHtml) ? $headHtml : "";
$bodyAttributes = isset($bodyAttributes) ? $bodyAttributes : "";
$cssLinks = isset($cssLinks) ? $cssLinks : array("css/Custom-Bootstrap-Util.css","css/root.css","css/Custom.css");

?>
<!DOCTYPE html>
<html data-bs-theme="light">
<head>
    <title><?php echo $pageTitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Commented out because its  include in project-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">-->
    <link href="/css/bootstrap.css" rel='stylesheet'>

    <?php
    //loads the Css links
    if (is_array($cssLinks)) {
        foreach ($cssLinks as $link) {
            echo "<link href=\"{$link}\" rel='stylesheet'>";
        }
    } else {
        echo "<link href=\"{$csslinks}\" rel='stylesheet'>";
    }
    ?>


    <?= $headHtml ?>
</head>
<body class="<?= $bodyClasses ?>" <?= $bodyAttributes ?>>