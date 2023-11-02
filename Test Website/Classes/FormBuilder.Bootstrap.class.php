<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    This class is for making forms alot quicker. This Class will be updated throughout the school year when need!
    I regert putting this effort. in I hope it will be a benefit in the future 😒
    
Modified 2023/10/31 by Joshua Mckenna
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

    function is_associative_array($array)
    {
        return (is_array($array) && !is_numeric(implode("", array_keys($array))));
    }
}

class BSFormBuilder
{

    const DEFAULT_SETTINGS = [
        'bootstrap' => true,
        'autoBrk' => true,
        'autoFrmt' => true,
    ];
    const BS_ROW = "mb-3 mt-3";
    const ROW = "style=\"display: flex;\"";
    private $settings = [];
    private $bootstrap = true;
    private $row = false;
//    private $linebreaks = false;
    private $div = false;
    private $form;

    /**
     * @param string $action
     * @param string $method
     * @param array $settings array(autoBR (true/false), bootstrap (true/false)) , Wether or not if it goes to a new line after each input
     * @param $attributes
     */
    public function __construct($action = '', $method = 'post', $settings = [], $attributes = '')
    {
        $this->settings = array_merge(self::DEFAULT_SETTINGS, $settings);
        $this->form = "<form action='{$action}' method='{$method}' {$attributes}>";

    }

    public function addInput($type, $name, $value = '', $placeholder = '', $classes = '', $attributes = '')
    {

        $this->form .= "<input type='{$type}' id='{$name}'  name='{$name}' value='{$value}'"
            . (empty($placeholder) ? "" : "placeholder=\"{$placeholder}\"")
            . (empty($settings['bootstrap']) ? "class=\"form-control {$classes}\"" : "class=\"{$classes}\"") . " {$attributes} >"
            . ($this->settings['autoBrk'] ? "<br />" : "");
    }


    public function addLabel($for, $text, $classes = '', $attributes = '')
    {
        if ((!$this->div || !$this->row) && $this->settings['autoFrmt']){
            $this->row();
        }


        $this->form .= "<label for='{$for}' " . (empty($settings['bootstrap']) ? "class=\"form-control {$classes}\"" : "class=\"{$classes}\"")
            . " {$attributes}>{$text}</label>" . ($this->settings['autoBrk'] ? "<br />" : "");

    }

    public function addTextarea($name, $placeholder = '', $text = '', $classes = '', $attributes = '')
    {
        $this->form .= "<textarea name=\"{$name}\" placeholder=\"{$placeholder}\">{$text}</textarea>" . ($this->settings['autoBrk'] ? "<br />" : "");
    }

    public function addButton($type = 'submit', $text = 'Submit', $value = 'submit', $classes = '', $attributes = '')
    {
        $this->form .= "<button type='{$type}' {$attributes} value='{$value}'>{$text}</button>" . ($this->settings['autoBrk'] ? "<br />" : "");
    }

    /**
     * Multi dimensional array is the Option first then the Value
     *  By default if there is no values given it will use the Option as the value.
     *
     * @param $items , Provide list with arrays or multi arraylist
     * @param $name , This is the name that you will call when gettting it from the $_post or #
     * @return void
     */
    public function addSelect($name, $items, $classes = '', $attributes = '')
    {
        if (is_array($items)) {
            $this->form .= '<select id="' . $name . '" name="' . $name . '" ' . $attributes . ' >';

            foreach ($items as $key => $item) {
                $this->form .= ' <option value="' . $key . '">' . $item . '</option>';
            }

            $this->form .= '</select>' . ($this->settings['autoBrk'] ? "<br />" : "");


        } else {
            $this->form .= "<p>Could not load Select Box! The provide variable is not a array</p>" . ($this->settings['autoBrk'] ? "<br />" : "");
        }
    }

    public function addDataList($name, $items, $placeholder = '', $classes = '', $attributes = '')
    {
        if (is_array($items)) {
            $this->form .= '<datalist id="' . $name . '" name="' . $name . '" placeholder="' . $placeholder . '"
            ' . empty($settings['bootstrap']) ? "class=\"form-control {$classes}\"" : "class=\"{$classes}\"" . '>';

            foreach ($items as $key => $item) {
                $this->form .= ' <option value="' . $key . '">' . $item . '</option>';
            }

            $this->form .= '</data>' . ($this->settings['autoBrk'] ? "<br />" : "");

        } else {
            $this->form .= "<p>Could not load Select Box! The provide variable is not a array</p>" . ($this->settings['autoBrk'] ? "<br />" : "");
        }
    }

    public function addCustomHTML($html)
    {
        $this->form .= $html;
    }

    public function setDoeslinebreaks($bool)
    {

        if (is_bool($bool)) {
            $this->linebreaks = $bool;
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Error with calling the setDoeslinebreaks() method from FormBuilderUtil. The passed in Variable is not a a boolean");';
            echo '</script>';
        }
    }

    public function row($classes = "", $attributes = "")
    {
        if ($this->row) {
            $this->row = false;
            $this->this->addRow("c");
        } else {
            $this->row = true;
            $this->this->addRow("o", $classes, $attributes);
        }
    }

    public function addRow($option = "c", $classes = "", $attributes = "")
    {
        switch (strtolower($option)) {
            case "c":
            case "close":
                $this->form .= "</div>";
                break;
            case "open":
            case "o":
                $this->form .= '<div class="' . (empty($settings['bootstrap']) ? "class=\"" . self::BS_ROW . " {$classes}\"" : "class=\"{$classes}\" " . self::ROW) . ' ' . $attributes . '>';
                break;
        }
    }

    public function div($classes = "", $attributes = "")
    {
        if ($this->div) {
            $div = false;
            $this->addDiv("c");
        } else {
            $div = true;
            $this->addDiv("o", $classes, $attributes);
        }
    }

    /*Enabling a row */

    public function addDiv($option = "c", $classes = "", $attributes = "")
    {
        switch (strtolower($option)) {
            case "c":
            case "close":
                $this->form .= "</div>";
                break;
            case "open":
            case "o":
                $this->form .= '<div class="' . (empty($settings['bootstrap']) ? "class=\"mb-3 mt-3 {$classes}\"" : "class=\"{$classes}\"") . '" ' . $attributes . '>';
                break;
        }
    }
/* WIP - I got to think of a better way of setting this up.*/
/*    public function inputGroup($classes = "", $attributes = "")
    {
        if ($this->div) {
            $div = false;
            $this->addInputGroup("c");
        } else {
            $div = true;
            $this->addInputGroup("o", $classes, $attributes);
        }
    }

    public function addInputGroup($option = "c", $classes = "", $attributes = "")
    {
        $html = "";

        switch (strtolower($option)) {
            case "c":
            case "close":
                $this->form .= "</div>";
                break;
            case "open":
            case "o":
                $this->form .= '<div class="' . (empty($settings['bootstrap']) ? "class=\"" . self::BS_ROW . " {$classes}\"" : "class=\"{$classes}\" " . self::ROW) . ' ' . $attributes . '>';
                break;
        }
    }*/

    public function build()
    {
        return $this->form . '</form>';
    }
}

?>