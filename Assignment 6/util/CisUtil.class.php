<?php

/**
 * Author: Joshua Mckena
 * Date: 2023/09/27
 * Description:
 * This class is for making random tasks alot quicker.  This Class will be updated throughout the school year when need!
 *
 * Modified by Joshua Mckenna since 2023/10/22
 *
 * Modified 2023/11/07 by Joshua Mckenna
 */
class CisUtil
{


    /**
     * Creates the starting section of a new html page
     * @param $title
     * @param $html "Custom html to add inside the head tags"
     * @return void
     */
    public static function startPage($title = 'My Website', $html = '', $classes = '', $attributes = "")
    {
        ?>
        <!DOCTYPE html>
        <html data-bs-theme="light">
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

                /*main,*/
                .page, .main, #main {
                    flex: 1 0 auto;
                }

                footer {
                    flex-shrink: 0;
                }

                #employeeArea {
                    width: 650px;
                    font-size: 12px;
                }


            </style>
            <?= $html; ?>
        </head>
        <body class="<?= $classes ?>" <?= $attributes ?>>
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
        <nav class="navbar navbar-expand-lg  sticky-top border-bottom bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <!--            <img src="photos/logo.webp" alt="Logo" width="25" height="25" class="d-inline-block align-text-top">
                    -->            My Website
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
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
     * @param string $text
     * @param array $array
     * @param boolean $caseCmp
     * @return boolean
     * @author Joshua Mckenna
     *
     */
    public static function isInArray($text, $array = array("text",), $caseCmp = false)
    {
        if (is_array($array) && is_string($text)) {
            foreach ($array as $key => $item) {
                if ($caseCmp) {
                    if (strcasecmp($text, $item) == 0) {
                        return true;
                    }
                } else {
                    if (strcmp($text, $item) == 0) {
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
     * @param string $text
     * @param array $array
     * @param boolean $caseCmp
     * @return boolean
     * @author Joshua Mckenna
     *
     */
    public static function isInArrayKey($text, $array = array("text",), $caseCmp = false)
    {
        if (is_array($array) && is_string($text)) {
            foreach ($array as $key => $item) {
                if ($caseCmp) {
                    if (strcasecmp($text, $key) == 0) {
                        return true;
                    }
                } else {
                    if (strcmp($text, $key) == 0) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    /**
     * @param $array
     * @return bool
     */
    public static function isMultidimensionalArray($array)
    {
        if (!is_array($array)) {
            return false;
        } else {
            foreach ($array as $item) {
                if (is_array($item)) {
                    return true;
                }
            }
            return false;
        }
    }

    public static function is_associative_array($array)
    {
        return (is_array($array) && !is_numeric(implode("", array_keys($array))));
    }

    public static function is_ass_array($array)
    {
        is_associative_array($array);
    }

    /**
     * Used to put spaces before Upcases
     * @param $inputString
     * @return array|string|string[]|null
     */
    public static function caseSpaceString($inputString)
    {
        // Use preg_replace to add a space before each uppercase letter
        $modifiedString = preg_replace('/([A-Z])/', ' $1', $inputString);
        $modifiedString = ucfirst($modifiedString);
        $modifiedString = trim($modifiedString);;
        return $modifiedString;
    }
    public static function displaySqlHead($inputString)
    {   $modifiedString = $inputString;
        $modifiedString = str_replace("_"," ",$modifiedString);
        $modifiedString = trim($modifiedString);;
        return $modifiedString;
    }

    public static function arrayToHtmlList($array)
    {
        $output = "";
        if (is_array($array)) {
            $output .= "<ul>";
            if (!CisUtil::is_associative_array($array)) {
                foreach ($array as $key => $item) {
                    $output .= "<li>" . $item . "</li>";
                }
            } else {

                foreach ($array as $key => $item) {
                    $output .= "<li> <strong class=\"text-capitalize\">" . CisUtil::caseSpaceString($key) . ": </strong>" . $item . "</li>";
                }

            }
            $output .= "</ul>";
            return $output;
        } else {
            return $array;
        }
    }

    public static function arrayToText($array, $autoBrk = true)
    {
        $output = "";
        if (is_array($array)) {
            if (!CisUtil::is_associative_array($array)) {
                foreach ($array as $key => $item) {
                    $output .= $item . ($autoBrk ? "<br>" : ", ");
                }
            } else {

                foreach ($array as $key => $item) {
                    $output .= "<strong class=\"text-capitalize\">" . CisUtil::caseSpaceString($key) . ": </strong>" . $item . ($autoBrk ? "<br>" : ", ");
                }

            }
            return $output;
        } else {
            return $array;
        }
    }


    public static function endSession()
    {
        // Remove all of the session variables.
        session_unset();
        // Delete the session cookie.
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]);
        }
        // Destroy the session
        session_destroy();
    }

    /**
     * @param array $array
     * @return boolean
     */
    public static function isArrayIfFilled($array)
    {
        $isFilled = true;
        if (is_array($array)) {
            foreach ($array as $item) {
                if ($item == null || $item == ""){
                    $isFilled = false;
                }
            }
        }
        return $isFilled;
    }

}

?>