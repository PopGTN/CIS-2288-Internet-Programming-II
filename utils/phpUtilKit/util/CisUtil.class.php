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
    //Cleans imputs from any Forms
    public
    static function cleanInputs($string)
    {
        $string = trim($string);
        $string = stripslashes($string);
        return htmlspecialchars($string);

    }

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

    public static function loadJSLinks($links)
    {
        if (is_array($links)) {
            foreach ($links as $link) {
                echo "<script src=\"{$link}\"></script>";
            }
        } else {
            echo "<script src=\"{$links}\"></script>";
        }
    }

    public static function loadCssLinks($links)
    {
        if (is_array($links)) {
            foreach ($links as $link) {
                echo "<link href=\"{$link}\" rel='stylesheet'>";
            }
        } else {
            echo "<link href=\"{$links}\" rel='stylesheet'>";
        }
    }
}
?>