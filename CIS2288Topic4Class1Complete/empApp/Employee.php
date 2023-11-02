<?php


class Employee
{
    private $empNum;
    private $empLastName;
    private $empFirstName;
    private $empSalary;
    private static $maxEmpId = 0;

    /**  Location for overloaded data.  */
    private $data = array();


    /**
     * Old style constructors are DEPRECATED in PHP 7.0,
     * and will be removed in a future version. You should always use __construct() in new code.
     *
     * Employee constructor.
     * @param $empNum
     * @param $empLastName
     * @param $empFirstName
     * @param $empSalary
     */
    /*public function Employee($empLastName, $empFirstName, $empSalary)
    {
        $this->empNum = $this->getNextEmpId();
        $this->empLastName = $empLastName;
        $this->empFirstName = $empFirstName;
        $this->empSalary = $empSalary;
    }*/
    /**
     * Employee constructor.
     * @param $empNum
     * @param $empLastName
     * @param $empFirstName
     * @param $empSalary
     */
    public function __construct($empLastName, $empFirstName, $empSalary)
    {
        $this->empNum = $this->getNextEmpId();
        $this->empLastName = $empLastName;
        $this->empFirstName = $empFirstName;
        $this->empSalary = $empSalary;
    }

    /**
     * @return int
     */
    public static function getNextEmpId()
    {
        //Use $this to refer to the current object (instance attributes).
        // Use self to refer to the current class (class attribute).
        // In other words, use $this->member for non-static members, use self::$member for static members.
        //Scope Resolution Operator (::)  allows access to static, constant, and overridden properties or methods of a class

        return  ++self::$maxEmpId;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "<p>Employee Number:  " . $this->empNum
            . "<br />Employee Name:  " . $this->empFirstName . " " . $this->empLastName
            . "<br />Salary:  " . number_format($this->empSalary,2) . "</p>";
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
    public function getEmpNum()
    {
        return $this->empNum;
    }

    /**
     * @param mixed $empNum
     */
    public function setEmpNum($empNum): void
    {
        $this->empNum = $empNum;
    }

    /**
     * @return mixed
     */
    public function getEmpLastName()
    {
        return $this->empLastName;
    }

    /**
     * @param mixed $empLastName
     */
    public function setEmpLastName($empLastName): void
    {
        $this->empLastName = $empLastName;
    }

    /**
     * @return mixed
     */
    public function getEmpFirstName()
    {
        return $this->empFirstName;
    }

    /**
     * @param mixed $empFirstName
     */
    public function setEmpFirstName($empFirstName): void
    {
        $this->empFirstName = $empFirstName;
    }

    /**
     * @return mixed
     */
    public function getEmpSalary()
    {
        return $this->empSalary;
    }

    /**
     * @param mixed $empSalary
     */
    public function setEmpSalary($empSalary): void
    {
        $this->empSalary = $empSalary;
    }


}