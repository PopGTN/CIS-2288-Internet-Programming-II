<!--
Author: Joshua Mckenna
Date: 2023/09/27
Description:
    This class is for making forms alot quicker. This Class will be updated throughout the school year when need!
    I regert putting this effort. in I hope it will be a benefit in the future 😒
    
Modified 2023/10/31 by Joshua Mckenna
    This was a complete rewrite of the logic and how things worked
-->

<?php
require_once 'CisUtil.class.php';

class BSFormBuilder
{

    const DEFAULT_SETTINGS = [
        'bootstrap' => true,
        'autoBrk' => false,
        'autoFrmt' => true,
    ];
    private $settings = [];

    //set wether or not if ur adding to a row
    private $row = false;
    //set wether or not if ur adding a item to a row
    private $col = false;
    //set wether or not if ur adding a div to the form
    private $div = false;

    private $form;
    private $count;

    /**
     * @param string $action
     * @param string $method
     * @param array $settings = [ <br>
     * 'bootstrap' => false, <br>
     * 'autoBrk' => false, <br>
     * 'autoFrmt' => true, <br>
     * 'autoFrmtRow' => true, <br>
     * ]; <br>
     * @param $attributes
     * @author Joshua Mckenna
     *
     */
    public function __construct($action = '', $method = 'post', $settings = array("autoFrmtRow" => true), $attributes = '')
    {
        $this->settings = array_merge(self::DEFAULT_SETTINGS, $settings);
        if(!isset($this->settings['autoFrmtRow'])){
            $this->settings['autoFrmtRow'] = $this->settings['autoFrmt'];
        }
        $this->form .= "<form action='{$action}' method='{$method}' {$attributes}>";

    }

    /**
     * @param array $settings = [ <br>
     *  'bootstrap' => false, <br>
     *  'autoBrk' => false, <br>
     *  'autoFrmt' => true, <br>
     *  'autoFrmtRow' => true, <br>
     *  ]; <br>
     * @return void
     */
    public function setSettings($settings)
    {
        if (is_array($settings)) {
            $this->settings = array_merge($this->settings, $settings);
        }
    }

    /**
     * @param string $type
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $classes
     * @param string $attributes
     * @return void
     */
    public function addInput($type, $name, $value = '', $placeholder = '', $classes = '', $attributes = '')
    {
        $colstarted  = $this->col ? true : false;
        $divstarted  = $this->div ? true : false;

        if (!$colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if (!$divstarted && $this->settings['autoFrmt'] && !$this->row){
            $this->div();
        }
        $this->form .= "<input type='{$type}' id='{$name}'  name='{$name}' value='{$value}'"
            . (empty($placeholder) && FormBuilderUtil::isInArray($type) ? "" : "placeholder=\"{$placeholder}\"")
            . ($this->settings['bootstrap'] ? "class=\"form-control {$classes}\"" : "class=\"{$classes}\"")
            . " {$attributes} >"
            . ($this->settings['autoBrk'] ? "<br>" : "");

        if ($colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if ($divstarted && $this->settings['autoFrmt']){
            $this->div();
        }
    }



    public function addLabel($for, $text, $classes = '', $attributes = '')
    {
        $colstarted  = $this->col ? true : false;
        $divstarted  = $this->div ? true : false;

        if (!$colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if (!$divstarted && $this->settings['autoFrmt'] && !$this->row){
            $this->div();
        }

        $this->form .= "<label for='{$for}' " . ($this->settings['bootstrap'] ? "class=\"form-label {$classes}\"" : "class=\"{$classes}\" style=\"margin-right: 15px;\"")
            . " {$attributes}>{$text}</label>" . ($this->settings['autoBrk'] ? "<br>" : "");

        if ($colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if ($divstarted && $this->settings['autoFrmt']){
            $this->div();
        }

    }

    public function addTextarea($name, $placeholder = '', $text = '', $classes = '', $attributes = '')
    {
        $colstarted  = $this->col ? true : false;
        $divstarted  = $this->div ? true : false;

        if (!$colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if (!$divstarted && $this->settings['autoFrmt'] && !$this->row){
            $this->div();
        }
        $this->form .= "<textarea name=\"{$name}\" placeholder=\"{$placeholder}\""
            .($this->settings['bootstrap'] ? "class=\"form-control {$classes}\"" : "class=\"{$classes}\"")
            ." {$attributes}>{$text}</textarea>" . ($this->settings['autoBrk'] ? "<br>" : "");

        if ($colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if ($divstarted && $this->settings['autoFrmt']){
            $this->div();
        }
    }
    /**
     * Used to add a button to the forn
     *
     * @author Joshua Mckenna
     * @since 2023/11/01
     *
     * @deprecated - use @addsubmit()
     * @param $html
     * @return void
     *
     */
    public function addButton($type = 'submit', $text = 'Submit', $value = 'submit', $classes = '', $attributes = '')
    {
        $colstarted  = $this->col ? true : false;
        $divstarted  = $this->div ? true : false;

        if (!$colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if (!$divstarted && $this->settings['autoFrmt'] && !$this->row){
            $this->div();
        }

        $this->form .= "<button type='{$type}' {$attributes} value='{$value}'>{$text}</button>" . ($this->settings['autoBrk'] ? "<br>" : "");

        if ($colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if ($divstarted && $this->settings['autoFrmt']){
            $this->div();
        }
    }

    /**
     * add a check box to the form
     * @param string $id
     * @param string $name
     * @param string $value
     * @param string $label
     * @param string $classes
     * @param string $attributes
     * @return void
     */
    public function addCheckBox ($id, $name, $value, $label, $classes = '', $attributes = ''){
        /*$colstarted  = $this->col ? true : false;
        $divstarted  = $this->div ? true : false;

        if (!$colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if (!$divstarted && $this->settings['autoFrmt'] && !$this->row){
            $this->div();
        }*/

        $this->form .= "<div ".($this->settings['bootstrap'] ? "class=\"form-check {$classes}\"" : "class=\"{$classes}\"")."{$attributes} >";
        $this->form .= "<input ".($this->settings['bootstrap'] ? "class=\"form-check-input {$classes}\"" : "")." type=\"checkbox\" id=\"{$id}\" name=\"{$name}\" value=\"{$value}\" >";
        $this->form .= "<label ".($this->settings['bootstrap'] ? "class=\"form-check-label {$classes}\"" : "style=\"margin-left: 5px;\"")." >{$label}</label>";
        $this->form .= "</div>";

/*        if ($colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if ($divstarted && $this->settings['autoFrmt']){
            $this->div();
        }*/
    }
    /**
     * add a switch to the form bootstrap only
     * @param string $id
     * @param string $name
     * @param string $value
     * @param string $label
     * @param string $classes
     * @param string $attributes
     * @return void
     */
    public function addSwitch ($id, $name, $value, $label, $classes = '', $attributes = ''){
        $this->form .= "<div ".($this->settings['bootstrap'] ? "class=\"form-check form-switch {$classes}\"" : "class=\"{$classes}\"")."{$attributes} >";
        $this->form .= "<input ".($this->settings['bootstrap'] ? "class=\"form-check-input {$classes}\"" : "")." type=\"checkbox\" id=\"{$id}\" name=\"{$name}\" value=\"{$value}\" >";
        $this->form .= "<label ".($this->settings['bootstrap'] ? "class=\"form-check-label {$classes}\"" : "style=\"margin-left: 5px;\"")." >{$label}</label>";
        $this->form .= "</div>";
    }


    /**
     * Add a radio button to the form
     *
     * @param string $id
     * @param string $name
     * @param string $value
     * @param string $label
     * @param string $classes
     * @param string $attributes
     * @return void
     */
    public function addRadioBTN ($id, $name, $value, $label, $classes = '', $attributes = ''){
/*        $colstarted  = $this->col ? true : false;
        $divstarted  = $this->div ? true : false;

        if (!$colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if (!$divstarted && $this->settings['autoFrmt'] && !$this->row){
            $this->div();
        }*/

        $this->form .= "<div ".($this->settings['bootstrap'] ? "class=\"form-check {$classes}\"" : "class=\"{$classes}\"")."{$attributes} >";
        $this->form .= "<input ".($this->settings['bootstrap'] ? "class=\"form-check-input {$classes}\"" : "")." type=\"radio\" id=\"{$id}\" name=\"{$name}\" value=\"{$value}\" >";
        $this->form .= "<label ".($this->settings['bootstrap'] ? "class=\"form-check-label {$classes}\"" : "style=\"margin-left: 5px;\"")." >{$label}</label>";
        $this->form .= "</div>";

/*        if ($colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if ($divstarted && $this->settings['autoFrmt']){
            $this->div();
        }*/
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
            $colstarted  = $this->col ? true : false;
            $divstarted  = $this->div ? true : false;

            if (!$colstarted && $this->settings['autoFrmtRow']){
                $this->col();
            }
            if (!$divstarted && $this->settings['autoFrmt'] && !$this->row){
                $this->div();
            }


            $this->form .= '<select id="' . $name . '" name="' . $name . '" '
                . $attributes . ($this->settings['bootstrap'] ? "class=\"form-select {$classes}\"" : "class=\"{$classes}\"")
                . ' >';
            if (FormBuilderUtil::is_associative_array($items)){
                foreach ($items as $key => $item) {
                    $this->form .= ' <option value="' . $key . '">' . $item . '</option>';
                }
            } else {
                foreach ($items as $item) {
                    $this->form .= ' <option value="' . $item . '">' . $item . '</option>';
                }
            }
            $this->form .= '</select>' . ($this->settings['autoBrk'] ? "<br>" : "");

            if ($colstarted && $this->settings['autoFrmtRow']){
                $this->col();
            }
            if ($divstarted && $this->settings['autoFrmt']){
                $this->div();
            }

        } else {
            $this->form .= "<p>Could not load Select Box! The provide variable is not a array</p>" . ($this->settings['autoBrk'] ? "<br>" : "");
        }
    }

    /**
     * @param string $name
     * @param array $items
     * @param string $placeholder
     * @param string $classes
     * @param string $attributes
     * @return void
     */
    public function addDataList($name = "test", $items = array("test" => "1", "test2" => "2", "test3" => "3"), $placeholder = '', $value = '', $classes = '', $attributes = '')
    {
        if (is_array($items)) {

            $colstarted  = $this->col ? true : false;
            $divstarted  = $this->div ? true : false;

            if (!$colstarted && $this->settings['autoFrmtRow']){
                $this->col();
            }
            if (!$divstarted && $this->settings['autoFrmt'] && !$this->row){
                $this->div();
            }


            //Creates the input
            $this->form .= "<input id='{$name}'  name='{$name}' value='{$value}' list='{$name}s'"
                . "placeholder=\"{$placeholder}\""
                . ($this->settings['bootstrap'] ? "class=\"form-control {$classes}\"" : "class=\"{$classes}\"")
                . " {$attributes} >"
                . ($this->settings['autoBrk'] ? "<br>" : "");

            //starts the date list
            $this->form .= '<datalist id="' . $name . 's" >';

            //Check which type of array it is
            if (FormBuilderUtil::is_associative_array($items)) {
                foreach ($items as $item => $description) {
                    $this->form .= ' <option value="' . $item . '">' . $description . '</option>';
                }
            } else {
                foreach ($items as $item) {
                    $this->form .= ' <option value="' . $item . '">' . '</option>';
                }
            }
            $this->form .= '</data>' . ($this->settings['autoBrk'] ? "<br>" : "");


            if ($colstarted && $this->settings['autoFrmtRow']){
                $this->col();
            }
            if ($divstarted && $this->settings['autoFrmt']){
                $this->div();
            }


        } else {
            $this->form .= "<p>Could not load Select Box! The provide variable is not a array</p>" . ($this->settings['autoBrk'] ? "<br>" : "");
        }
    }

    /**
     * Added a submit button
     * @param string $text
     * @param string $classes
     * @param string $attributes
     * @return void
     */
    public function addSubmit($text = "Submit", $classes = "", $attributes = "")
    {
        $colstarted  = $this->col ? true : false;
        $divstarted  = $this->div ? true : false;

        if ($colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if ($divstarted && $this->settings['autoFrmt']){
            $this->div();
        }

        $this->form .= '<button type="submit" ' . ($this->settings['bootstrap'] ? "class=\"btn btn-primary mt-3 {$classes}\"" : "class=\"{$classes}\" ") . '>' . $text . '</button>';


        if (!$colstarted && $this->settings['autoFrmtRow']){
            $this->col();
        }
        if (!$divstarted && $this->settings['autoFrmt'] && !$this->row){
            $this->div();
        }


    }

    /**
     * Used to add custom html to the forn
     *
     * @deprecated
     * @param $html
     * @return void
     */
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



    //========================================================================
    /*
     * MANNUAL ADDING OPTIONS
     */
    //========================================================================
    public function addRow($option = "c", $classes = "", $attributes = "")
    {
        switch (strtolower($option)) {
            case "c":
            case "close":
                $this->form .= "</div>";
                break;
            case "open":
            case "o":
                $this->form .= "<div " . ($this->settings['bootstrap'] ? "class=\"row {$classes}\"" : "class=\"{$classes}\" style=\"display: flex;\"") . " " . $attributes . ">";
                break;
        }
//        $this->form .= "executed here";
    }

    public function addRowItem($option = "c", $classes = "", $attributes = "")
    {

        if ($this->row) {
            switch (strtolower($option)) {
                case "c":
                case "close":
                    $this->form .= "</div>";
                    break;
                case "open":
                case "o":
                    $this->form .= "<div " . ($this->settings['bootstrap'] ? "class=\"col {$classes}\"" : "class=\"{$classes}\" style=\"display: inline-block; margin: 10px;\"") . " " . $attributes . ">";
                    break;
            }
        }
    }

    public function addDiv($option = "c", $classes = "inputDiv", $attributes = "")
    {
        switch (strtolower($option)) {
            case "c":
            case "close":
                $this->form .= "</div>";
                break;
            case "open":
            case "o":
                $this->form .= '<div ' . ($this->settings['bootstrap'] ? "class=\"mb-3 mt-3 {$classes}\"" : "class=\"{$classes}\" style=\"margin: 10px;\"") . ' ' . $attributes . '>';
                break;
        }
    }
    //========================================================================
    /*
     * The methods below are to make opening/closing divs 10x faster than
     * mannual choosing the options
     */
    //========================================================================
    public function row($classes = "", $attributes = "")
    {
        if ($this->row) {
            $this->row = false;
            $this->addRow("c");
        } else {
            $this->row = true;
            $this->addRow("o", $classes, $attributes);
        }

    }

    public function col($classes = "", $attributes = "")
    {
        if ($this->col) {
            $this->col = false;
            $this->addRowItem("c");
        } else {
            $this->col = true;
            $this->addRowItem("o", $classes, $attributes);
        }
    }

    public function div($classes = "", $attributes = "")
    {
        if ($this->div) {
            $this->div = false;
            $this->addDiv("c");
        } else {
            $this->div = true;
            $this->addDiv("o", $classes, $attributes);
        }
    }

    //========================================================================


    /**
     * Echo out the code
     *
     * @author  Joshua Mckenna
     * @since 2023/11/1
     */
    public function build()
    {
        echo $this->form . '</form>';
    }

    /**
     * Used to get all of the html code in form as a string.
     * @return string
     *
     * @author  Joshua Mckenna
     * @since 2023/11/1
     */
    public function __toString()
    {
        return $this->form . '</form>';
    }

}


class FormBuilderUtil
{
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

    /**
     * Used to see if an string is in array list
     *
     * @param string $text
     * @param array $array
     * @param boolean $caseCmp
     * @return boolean
     */
    public static function isInArray($text, $array = array("text", "search", "url", "tel", "email", "password"), $caseCmp = false)
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

}

?>