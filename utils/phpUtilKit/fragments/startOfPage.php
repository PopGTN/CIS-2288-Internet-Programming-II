<?php
global $bodyAttributes, $pageTitle, $bodyClasses, $headHtml, $csslinks, $root, $canonical, $description;
$pageTitle = isset($pageTitle) ? $pageTitle : "My Website";
$bodyClasses = isset($bodyClasses) ? $bodyClasses : "";
$headHtml = isset($headHtml) ? $headHtml : "";
$bodyAttributes = isset($bodyAttributes) ? $bodyAttributes : "";
$cssLinks = isset($cssLinks) ? $cssLinks : "";
$root = (!isset($root) ? "" : $root);
$canonical = isset($canonical) ? $canonical : "";
$description = isset($description) ? $description : "";
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <title><?= $pageTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$description?>"/>
    <meta name="revisit-after" content="7 days">
    <meta name="author" content="Joshua Mckenna">
    <link rel="canonical" href="https://www.joshuamc.ca/<?=$canonical?>">
    <link href="<?= $root ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?= $root ?>css/Custom-Bootstrap-Util.css" rel="stylesheet">
    <link href="<?= $root ?>css/root.css" rel="stylesheet">
    <link href="<?= $root ?>css/Custom.css" rel="stylesheet">
    <link href="<?= $root ?>css/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <?php
    //loads the Css links
    if ($cssLinks != "") {
        if (is_array($cssLinks)) {
            foreach ($cssLinks as $link) {
                echo "<link href=\"{$link}\" rel='stylesheet'>";
            }
        } else {
            echo "<link href=\"{$csslinks}\" rel='stylesheet'>";
        }
    }
    ?>
    <?= $headHtml ?>
</head>
<body class="<?= $bodyClasses ?>" <?= $bodyAttributes ?>>