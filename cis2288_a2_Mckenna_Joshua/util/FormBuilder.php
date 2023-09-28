<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    This class is for making forms alot quicker.
    This Class will be updated throughout the school year when need!
-->

<?php

class FormBuilderUtil
{
    /**
     * Use to check if array is a multi dimensional array
     *
     * Credits
     * https://sl.bing.net/k6kXKRa3tQG
     *
     * @param $array
     * @return bool
     */
    public static function isMultidimensionalArray($array)
    {
        if (!is_array($array)) {
            return false;
        }
        foreach ($array as $value) {
            if (is_array($value)) {
                return true;
            }
        }
        return false;
    }
}

class FormBuilder
{
    private $form;
    private $linebreaks = false;

    /**
     * @param $action
     * @param $method
     * @param $autoBR, Wether or not if it goes to a new line after each input
     * @param $attributes
     */
    public function __construct($action = '', $method = 'post', $autoBR = true, $attributes = '')
    {
        $this->linebreaks = $autoBR;
        $this->form = "<form action='{$action}' method='{$method}' {$attributes}>";
    }

    public function addInput($type, $name, $value = '', $attributes = '')
    {
        if ($this->linebreaks) {
            $this->form .= "<input type='{$type}' name='{$name}' value='{$value}' {$attributes}><br>";
        } else {
            $this->form .= "<input type='{$type}' name='{$name}' value='{$value}' {$attributes}>";
        }
    }


    public function addLabel($for, $text, $attributes = '')
    {
        if ($this->linebreaks) {
            $this->form .= "<label for='{$for}' {$attributes}>{$text}</label><br>";

        } else {
            $this->form .= "<label for='{$for}' {$attributes}>{$text}</label> ";
        }
    }

    public function addTextarea($name, $value = '', $attributes = '')
    {
        if ($this->linebreaks) {
            $this->form .= "<textarea name='{$name}'>{$value}</textarea><br>";
        } else {
            $this->form .= "<textarea name='{$name}'>{$value}</textarea>";
        }
    }

    public function addButton($type = 'submit', $text = 'Submit', $attributes = '')
    {
        if ($this->linebreaks) {
            $this->form .= "<button type='{$type}' {$attributes}>{$text}</button><br>";
        } else {
            $this->form .= "<button type='{$type}' {$attributes}>{$text}</button>";
        }
    }

    /**
     * Multi dimensional array is the Option first then the Value
     *  By default if there is no values given it will use the Option as the value.
     *
     * @param $items , Provide list with arrays or multi arraylist
     * @param $name , This is the name that you will call when gettting it from the $_post or #
     * @return void
     */
    public function addSelect($name, $items, $attributes = '')
    {
        if (is_array($items)) {
            $this->form .= '<select id="' . $name . '" name="' . $name . '" '.$attributes.'>';

            if (FormBuilderUtil::isMultidimensionalArray($items)) {

                for ($row = 0; $row < count($items); $row++) {
                    $this->form .= ' <option value="' . $items[$row][1] . '">' . $items[$row][0] . '</option>';
                }

            } else {
                foreach ($items as $item) {
                    $this->form .= ' <option value="' . $item . '">' . $item . '</option>';
                }
            }

            if ($this->linebreaks) {
                $this->form .= '</select> <br>';

            } else {
                $this->form .= '</select>';
            }


        } else {
            $this->form .= "<p>Could not load Select Box! The provide variable is not a array</p>";
        }
    }

    public function addDataList($name, $items, $attributes = '')
    {
        if (is_array($items)) {
            $this->form .= '<select id="' . $name . '" name="' . $name . '">';

            if (FormBuilderUtil::isMultidimensionalArray($items)) {

                for ($row = 0; $row < count($items); $row++) {
                    $this->form .= ' <option value="' . $items[$row][1] . '">' . $items[$row][0] . '</option>';
                }

            } else {
                foreach ($items as $item) {
                    $this->form .= ' <option value="' . $item . '">' . $item . '</option>';
                }
            }

            if ($this->linebreaks) {
                $this->form .= '</select> <br>';

            } else {
                $this->form .= '</select>';
            }


        } else {
            $this->form .= "<p>Could not load Select Box! The provide variable is not a array</p>";
        }
    }

    public function addCustomHTML($html)
    {
        $this->form .= $html;
    }

    public function build()
    {
        return $this->form . '</form>';
    }

    public function toString()
    {
        return $this->form;
    }
}

/*
class BootStrapFormBuilder
{
    private $form;

    public function __construct($action = '', $method = 'post')
    {
        $this->form = "<form action='{$action}' method='{$method}' class='container'>";
    }

    public function addInput($type, $name, $value = '', $label = '', $attributes = '')
    {
        $this->form .= "<div class='mb-3'>";
        if ($label != '') {
            $this->form .= "<label for='{$name}' class='form-label'>{$label}</label>";
        }
        $this->form .= "<input type='{$type}' class='form-control' id='{$name}' name='{$name}' value='{$value}' {$attributes}>";
        $this->form .= "</div>";
    }

    public function addTextarea($name, $value = '', $label = '', $attributes = '')
    {
        $this->form .= "<div class='mb-3'>";
        if ($label != '') {
            $this->form .= "<label for='{$name}' class='form-label'>{$label}</label>";
        }
        $this->form .= "<textarea class='form-control' id='{$name}' name='{$name}'  {$attributes}>{$value}</textarea>";
        $this->form .= "</div>";
    }

    public function addButton($type = 'submit', $text = 'Submit', $attributes = 'class=\'btn btn-primary\' ')
    {
        $this->form .= "<button type='{$type}' {$attributes}>{$text}</button>";
    }


    public function selectInput($name, $items, $lable = '', $attributes = '')
    {
        if (is_array($items)) {
            $this->form .= "<div class='mb-3'>";
            if ($label != '') {
                $this->form .= "<label for='{$name}' class='form-label' {$attributes}>{$label}</label>";
            }
            $this->form .= '<select id="' . $name . '" name=" ">';

            if (self::isMultidimensionalArray($items)) {

                for ($row = 0; $row < count($items); $row++) {
                    $this->form .= ' <option value="' . $items[$row][1] . '">' . $items[$row][0] . '</option>';
                }

            } else {
                foreach ($items as $item) {
                    $this->form .= ' <option value="' . $item . '">' . $item . '</option>';
                }
            }
            $this->form .= '</select>';
            $this->form .= "</div>";

        } else {
            $this->form .= "<div class='mb-3'> <p>Could not load Select Box! The provide variable is not a array</p></div>";
        }
    }

    public function addCustomHTML($html)
    {
        $this->form .= $html;
    }

    public function build()
    {
        return $this->form . '</form>';
    }
}
*/

?>