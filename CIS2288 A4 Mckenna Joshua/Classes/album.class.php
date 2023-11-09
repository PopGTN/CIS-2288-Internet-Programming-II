<?php
/**
Author: Joshua Mckenna
Date: 2023/09/27
Description: Album object class
*/

require_once 'CisUtil.class.php';

class album
{

    private $albumTitle;
    private $artist;
    private $publisher;
    private $genre;
    private $data = array();

    /**
     * @param string $albumTitle
     * @param string $artist
     * @param string $publisher
     * @param string $genre
     * @param array $songs
     */
    public function __construct($albumTitle, $artist, $publisher, $genre)
    {
        $this->albumTitle = $albumTitle;
        $this->artist = $artist;
        $this->publisher = $publisher;
        $this->genre = $genre;
    }
    /**
     * The __get() method (Magic Methods) is called whenever you attempt to read a non-existing
     * or private property of an object.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }else{
            //returns the value of the attribute even though it is private/hidden
            return $this->$name;
        }

    }

    /**
     * The __set() method (Magic Methods) is called whenever you attempt to write to
     * a non-existing or private property of an object.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if(property_exists($this,$name)) {

            $this->$name = $value;

        }else{
            //An associative array s created when a property that has not been declared is set
            $this->data[$name] = $value;

        }
    }

    /**
     * Retursn the class attributes.
     * @return string
     */
    public function __toString()
    {
        return "<strong>Album Title:</strong> $this->albumTitle <br>
            <strong>Artist:</strong> $this->artist<br>
            <strong>Publisher:</strong> $this->publisher<br>
            <strong>Genre:</strong> $this->genre<br>"
            . $this->showCustomAttributes();
    }

    /**
     * Used to get Custom Attributesas tostring
     * @return string
     */
    private function showCustomAttributes(){
        //loop through data array and ouput the key(attribute name) value(attribute value)
        $output = "";
        foreach ($this->data as $attributeName => $attributeValue){

            //finds what type of $attribute it is (example: string/array/ associative array )
            // string will be just outputed like normal. but array lists will be put into a list
            if (!is_array($attributeValue)){
                $output .= "<strong class=\"text-capitalize\">" . CisUtil::caseSpaceString($attributeName) . ":</strong> " . $attributeValue . "</br>";
            } else {
                $output .= "<strong class=\"text-capitalize\">". CisUtil::caseSpaceString($attributeName).":</strong> <br>";
                $output .= "<ul>";
                if (!CisUtil::is_associative_array($attributeValue)) {
                    foreach ($attributeValue as $key => $item) {
                        $output .= "<li>".$item."</li>";
                    }
                }
                else {
                    foreach ($attributeValue as $key => $item) {
                        $output .= "<li> <strong class=\"text-capitalize\">".CisUtil::caseSpaceString($key).": </strong>".$item."</li>";
                    }
                }


                $output .= "</ul>";
            }
        }
        return $output;
    }


}