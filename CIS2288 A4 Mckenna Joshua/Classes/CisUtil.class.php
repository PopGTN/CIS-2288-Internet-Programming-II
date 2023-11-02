<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    This class is for making random tasks alot quicker.  This Class will be updated throughout the school year when need!
	
Modified by Joshua Mckenna since 2023/10/22

Modified 2023/10/31 by Joshua Mckenna

not SELF

$result = condition ? value1(if true) : value2(if false);

-->

<?php class CisUtil
{

    /**
     * Creates the starting section of a new html page
     * @param $title
     * @param $html "Custom html to add inside the head tags"
     * @return void
     */
    public static function startPage($title = 'My Website', $html = '', $classes = "bg-body-secondary")
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?php echo $title; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!--Commented out because its  include in project-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
                  crossorigin="anonymous">
            <style>

                body {
                    display: flex;
                    flex-direction: column;
                    min-height: 100vh;
                }

                /*main,*/.page, .main {
                    flex: 1 0 auto;
                }

                footer {
                    flex-shrink: 0;
                }

                .inputDiv{
                    margin: 0px;
                }

            </style>
            <?= $html; ?>
        </head>
        <body class="<?= $classes ?>">
        <?php
    }

    public
    static function endPage($html = '')
    {
        echo $html;
        ?>

        <!--Commented out because its  include in project-->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous"></script>
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
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">My Website</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation ">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">About</a>

                    </div>
                </div>
            </div>
        </nav>
    <?php }


    /*Stores the footor So I dont have to keep remaking it */
    public
    static function footer()
    { ?>
        <footer class="bg-light .bg-body-secondary">
            <div class="container py-2 px-5  row-cols-3 ">
                <h6 class="">My Website Inc. © 2023</h6>
            </div>
        </footer>
    <?php }


    public static function moneyFormate($money, $symbol = '$')
    {
        return "$" . number_format($money, 2, '.', ',');

    }

    public static function sendMessageBox($message)
    {
        echo "<script>alert('" . $message . "')</script>";
    }

    public static function autoload($dir = "")
    {
        if (!empty($dir)) {
            spl_autoload_register(function ($class_name) use ($dir) {
                $directory = new RecursiveDirectoryIterator($dir);
                $iterator = new RecursiveIteratorIterator($directory);
                $regex = new RegexIterator($iterator, '/^.+\.class\.php$/i', RecursiveRegexIterator::GET_MATCH);

                foreach ($regex as $file) {
                    if (strpos($file[0], $class_name) !== false) {
                        require_once $file[0];
                        break;
                    }
                }
            });
        } else {
            spl_autoload_register(function ($class) {
                //include $class . '.php';
                include 'classes/' . $class . '.class.php';

            });
        }
    }
    /**
     * Used to see if an string is in array list
     *
     * @author Joshua Mckenna
     *
     * @param string $text
     * @param array $array
     * @param boolean $caseCmp
     * @return boolean
     */
    public static function isInArray($text, $array = array("text",), $caseCmp = false)
    {
        if (is_array($array) && is_string($text)) {
            foreach ($array as $key => $item) {
                if ($caseCmp) {
                    if (strcasecmp($text,$item) == 0){
                        return true;
                    }
                } else {
                    if (strcmp($text,$item) == 0){
                        return true;
                    }
                }
            }
        }
        return false;
    }
    /**
     * Used to see if an string is a key in a array
     *
     * @author Joshua Mckenna
     *
     * @param string $text
     * @param array $array
     * @param boolean $caseCmp
     * @return boolean
     */
    public static function isInArrayKey($text, $array = array("text",), $caseCmp = false)
    {
        if (is_array($array) && is_string($text)) {
            foreach ($array as $key => $item) {
                if ($caseCmp) {
                    if (strcasecmp($text,$key) == 0){
                        return true;
                    }
                } else {
                    if (strcmp($text,$key) == 0){
                        return true;
                    }
                }
            }
        }
        return false;
    }

}

?>