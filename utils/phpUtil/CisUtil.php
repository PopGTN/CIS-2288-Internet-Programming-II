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
    public static function startPage($title = 'My Website', $html = '' )
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?php echo $title; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!--Commented out because its  include in project-->
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
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
                        <a class="nav-link active " aria-current="page" href="orderForm.php">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="view.php">Orders</a>

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
     * @param $text  "either array of Custom html or just text"
     * @param $style "Set all the style here. Leave out style for default Settings" <br>
     * $style = [ <br>
        'bgColor' => "#D3D3D3FF", <br>
        'height' => "200px", <br>
        'fontColor' => 'black', <br>
        'classes' => 'container', <br>
        'titleClasses' => 'display-1', <br>
        'STClasses' => '', <br>
        'underline' => true, <br>
        'underlineColor' => "black", <br>
        'underlineWidth' => "2px", <br>
        'STUnderline' => false, <br>
        'STUnderlineColor' => "black", <br>
        'STUnderlineSize' => "3px", <br>
        'bottomSpacing' => '1rem', <br>
        'textAlign'=> 'center', <br>
        'STTextAlign'=> 'center', <br>
        ];
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
            'titleClasses' => 'display-1',
            'STClasses' => '',
            'underline' => true,
            'underlineWidth' => "2px",
            'STUnderline' => false,
            'STUnderlineSize' => "3px",
            'bottomSpacing' => '1rem',
            'textAlign'=> 'center',
            'STTextAlign'=> 'center',
        ];
        // Merge default style with provided style
        $style = array_merge($defaultStyle, $style);


        //Set it the font colour the same
        if (!isset($style['STFontColor'])){
            $style['STFontColor'] =  $style['fontColor'];
        }
        if (!isset($style['underlineColor'])){
            $style['underlineColor'] =  $style['fontColor'];
        }
        if (!isset($style['underlineColor'])){
            $style['STUnderlineColor'] =  $style['STFontColor'];
        }
        if (!isset($style['STBottomSpacing'])){
            $style['STBottomSpacing'] =  $style['bottomSpacing'];
        }


        ?>

        <header class="<?= $style['classes'] ?>"
                style="
                <?= 'background-color: ' . $style['bgColor'] ?>;
                <?= "min-height: " . $style['height'] ?>;
                <?php if (!empty($style['image'])) { ?>
                        background-image: url('<?= $style['image'] ?>');
                <?php } ?>
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        "
        >
            <div>
                <?php
                if (is_array($text)) {

                    ?>
                    <h1 class="<?= $style['titleClasses'] ?>"
                        style="
                            width: fit-content; margin: auto;
                            color: <?= $style['fontColor']?>;
                            margin-bottom: <?= $style['bottomSpacing']?>;
                            text-align: <?= $style['STTextAlign']?>;
                        <?php if ($style['underline']) { ?>
                            border-bottom-color: <?= $style['underlineColor']?>;
                            border-bottom-style: solid;
                            border-bottom-width: <?=$style['underlineWidth'] ?>;
                        <?php } ?>

                        ">
                        <?= $text[0] ?>
                    </h1>
                    <?php
                    for ($x = 1; $x < count($text); $x++) {?>
                        <p class="<?= $style['STClasses'] ?>"
                            style="
                            color: <?= $style['STFontColor']?>;
                            text-align: <?= $style['STTextAlign']?>;
                        <?php if ($x != (count($text) - 1)) { ?>
                            margin-bottom: <?= $style['STBottomSpacing']?>;
                        <?php } ?>
                        <?php if ($style['STUnderline']) { ?>
                            border-bottom-color: <?= $style['STUnderlineColor']?>;
                            border-bottom-width: <?=$style['STUnderlineWidth'] ?>;
                            border-bottom-style: solid;
                        <?php } ?>

                                    ">
                            <?= $text[$x] ?>
                        </p>


                    <?php }
                } else { ?>
                    <h1 class="<?= $style['titleClasses'] ?>"
                        style="
                                color: <?= $style['fontColor']?>;
                                margin-bottom: <?= $style['bottomSpacing']?>;
                                text-align: <?= $style['STTextAlign']?>;
                        <?php if ($style['underline']) { ?>
                            border-bottom-color: <?= $style['underlineColor']?>;
                            border-bottom-style: solid;
                            border-bottom-width: <?=$style['underlineWidth'] ?>;
                        <?php } ?>

                                ">
                        <?= $text ?>
                    </h1>
                <?php }
                ?>
            </div>
        </header>
        <?php
    }


}

?>