<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    This class is for making random tasks alot quicker.  This Class will be updated throughout the school year when need!
-->

<?php class CisUtil
{

    /**
     * Creates the starting section of a new html page
     * @param $title
     * @param $html "Custom html to add inside the head tags"
     * @return void
     */
    public static function startPage($title = 'My Website', $html = '')
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?php echo $title; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!--Commented out because its  include in project-->

            <link href="/css/bootstrap.css" rel="stylesheet">
            <link href="../css/bootstrap.css" rel="stylesheet">
            <link href="css/bootstrap.css" rel="stylesheet">


            <?php echo $html; ?>
        </head>
        <body>
        <?php
    }

    public
    static function endPage($html = '')
    {
        echo $html;
        ?>

        <!--Commented out because its  include in project-->

        <script src="/js/bootstrap.bundle.js"</script>
        <script src="../js/bootstrap.bundle.js"</script>
        <script src="js/bootstrap.bundle.js"</script>
        </body>
        </html>
    <?php }


    //Cleans imputs from any Forms
    public
    static function cleanInputs($string)
    {
        $string = trim($string);
        $string = stripslashes($string);
        return htmlspecialchars($string);

    }

    /*Stores the navbar So I dont have to keep remaking it */
    public
    static function navbar()
    { ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary container sticky-top">
            <div class="container">
                <a class="navbar-brand" href="orderForm.php">Acme Accessories Inc</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="orderForm.php">Home</a>

                        <a class="nav-link" href="view.php">Orders</a>
                        <a class="nav-link" href="resetFile.php">Reset File</a>
                    </div>
                </div>
            </div>
        </nav>
    <?php }


    /*Stores the footor So I dont have to keep remaking it */
    public
    static function footer()
    { ?>
        <footer class="bg-dark  container bg-body-secondary py-2 px-5  row-cols-3 container-fluid">
            <h6 class="">Acme Accessories Inc. © 2023</h6>
        </footer>
    <?php }


    /**
     * @param $text "either array of Custom html or just text"
     * @param $style "Set all the style here. Leave out style for default Settings" <br>
     * $style = [ <br>
     * 'image' => '', <br>
     * 'bgColor' => "#D3D3D3FF", <br>
     * 'height' => "200px", <br>
     * 'fontColor' => 'black', <br>
     * 'classes' => 'container', <br>
     * 'titleClasses' => 'display-1', <br>
     * 'STClasses' => '', <br>
     * 'underline' => true, <br>
     * 'underlineColor' => "black", <br>
     * 'underlineWidth' => "2px", <br>
     * 'STUnderline' => false, <br>
     * 'STUnderlineColor' => "black", <br>
     * 'STUnderlineSize' => "3px", <br>
     * 'bottomSpacing' => '1rem', <br>
     * 'textAlign'=> 'center', <br>
     * 'STTextAlign'=> 'center', <br>
     * 'fontSize' => "", <br>
     * 'STFontSize' => "", <br>
     * 'bgRepeat' => 'no-repeat', <br>
     * 'bgPosition' => 'center', <br>
     * 'bgSize' => 'cover', <br>
     * 'alignText' => 'center' <br>
     * ];
     * @return void
     */
    public static function header($text = "Acme Accessories", $style = [])
    {
        // Set default values for style if not provided
        $defaultStyle = [
            'bgColor' => "#D3D3D3FF",
            'height' => "200px",
            'fontColor' => 'black',
            'classes' => 'container',
            'titleClasses' => 'display-3',
            'STClasses' => '',
            'underline' => true,
            'underlineWidth' => "3px",
            'STUnderline' => false,
            'STUnderlineWidth' => "2px",
            'STFontSize' => "1.8em",
            'bottomSpacing' => "0.5rem",
            'bgRepeat' => 'no-repeat',
            'bgPosition' => 'center',
            'bgSize' => 'cover',
            'alignText' => 'center'
        ];
        // Merge default style with provided style
        $style = array_merge($defaultStyle, $style);


        //Set it the font colour the same
        if (!isset($style['STFontColor'])) {
            $style['STFontColor'] = $style['fontColor'];
        }
        if (!isset($style['underlineColor'])) {
            $style['underlineColor'] = $style['fontColor'];
        }
        if (!isset($style['STUnderlineColor'])) {
            $style['STUnderlineColor'] = $style['STFontColor'];
        }
        if (!isset($style['STBottomSpacing'])) {
            $style['STBottomSpacing'] = $style['bottomSpacing'];
        }


        ?>

        <header class="<?= $style['classes'] ?>"
                style="
                <?= 'background-color: ' . $style['bgColor'] ?>;
                <?= "min-height: " . $style['height'] ?>;
                <?php if (!empty($style['image'])) { ?>
                        background-image: url('<?= $style['image'] ?>');
                <?php } ?>


                        background-size: <?=$style['bgSize']?>;
                        background-position: <?=$style['bgPosition']?>;
                        background-repeat:  <?=$style['bgRepeat']?>;
                        display: flex;
                        justify-content: <?=$style['alignText']?>;
                        align-items: center;
                        "
        >
            <div>
                <?php
                if (is_array($text)) {

                    ?>
                    <h2 class="<?= $style['titleClasses'] ?>"
                        style="
                                width: fit-content; margin: auto;
                                color: <?= $style['fontColor'] ?>;
                                margin-bottom: <?= $style['bottomSpacing'] ?>;

                        <?php if ($style['underline']) { ?>
                                border-bottom-color: <?= $style['underlineColor']?>;
                            border-bottom-style: solid;
                            border-bottom-width: <?=$style['underlineWidth'] ?>;
                        <?php } ?>
                        <?php if (isset($style['fontSize'])) { ?>
                                font-size: <?=$style['fontSize']?>;
                        <?php } ?>

                                ">
                        <?= $text[0] ?>
                    </h2>
                    <?php
                    for ($x = 1; $x < count($text); $x++) { ?>
                        <p class="<?= $style['STClasses'] ?>"
                           style="
                                   width: fit-content; margin: auto;
                                   color: <?= $style['STFontColor'] ?>;

                           <?php if ($x != (count($text) - 1)) { ?>
                                   margin-bottom: <?= $style['STBottomSpacing']?>;
                        <?php } ?>
                           <?php if ($style['STUnderline']) { ?>
                                   border-bottom-color: <?= $style['STUnderlineColor']?>;
                                   border-bottom-width: <?= $style['STUnderlineWidth'] ?>;
                                   border-bottom-style: solid;
                        <?php } ?>
                           <?php if (isset($style['STFontSize'])) { ?>
                                   font-size: <?=$style['STFontSize']?>;
                        <?php } ?>

                                   ">
                            <?= $text[$x] ?>
                        </p>


                    <?php }
                } else { ?>
                    <h2 class="<?= $style['titleClasses'] ?>"
                        style="
                                color: <?= $style['fontColor'] ?>;
                                margin-bottom: <?= $style['bottomSpacing'] ?>;
                        <?php if ($style['underline']) { ?>
                                border-bottom-color: <?= $style['underlineColor']?>;
                                border-bottom-style: solid;
                                border-bottom-width: <?=$style['underlineWidth'] ?>;
                        <?php } ?>
                        <?php if (isset($style['fontSize'])) { ?>
                                font-size: <?=$style['fontSize']?>;
                        <?php } ?>

                                ">
                        <?= $text ?>
                    </h2>
                <?php }
                ?>
            </div>
        </header>
        <?php
    }


}

?>