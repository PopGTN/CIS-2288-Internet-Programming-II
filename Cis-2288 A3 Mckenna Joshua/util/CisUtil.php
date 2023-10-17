<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    This class is for making random tasks alot quicker.  This Class will be updated throughout the school year when need!
-->

<?php class CisUtil
{
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
     * @param $text , either array of Custom html or just text
     * @param $style , a array that holds:
     * 'fontColour' (Doesn't apply to custom html),
     * 'classes' (for the Header),
     * 'bgColor' (Background Colour)
     * 'txtClasses' (Doesn't apply to custom html)
     * @return void
     */
    public static function header($text = "Acme Accessories", $style = [])
    {
        // Set default values for style if not provided
        $defaultStyle = [
            'bgColor' => "#D3D3D3FF",
            'height' => "200px",
            'fontColour' => 'black',
            'classes' => 'container',
            'txtClasses' => 'mb-3 border-bottom border-2 border-black display-4'
        ];

        // Merge default style with provided style
        $style = array_merge($defaultStyle, $style);
        ?>

        <header class="<? echo $style['classes'] ?>"
                style="
                        background-color: <?php echo $style['bgColor'] ?>;
                        height: <?php echo $style['height'] ?>;
                <?php if (!empty($style['image'])) { ?>
                        background-image: url('<?php echo $style['image'] ?>');
                <?php } ?>
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        "
        >
            <div class="text-white">
                <?php
                if (is_array($text)) {
                    foreach ($text as $html) {
                        echo $html;
                    }
                } else {
                    echo '<h1 class="' . $style['txtClasses'] . '" style="color: ' . $style['fontColour'] . '">' . $text . '</h1>';
                }
                ?>
            </div>
        </header>
        <?php
    }


}

?>