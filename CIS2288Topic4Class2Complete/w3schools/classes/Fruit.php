<?php


class Fruit
{
    //public $name;
    //public $color;
    //Child/subclass need to use a custom constructor reference to set private variables
  private $name;
  private $color;

    /**  Location for overloaded data.  */
    private $data = array();

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function intro()
    {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }


}