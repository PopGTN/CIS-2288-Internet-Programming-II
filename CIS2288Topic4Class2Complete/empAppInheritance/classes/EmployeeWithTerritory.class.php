<?php
require_once ('Employee.class.php');

class EmployeeWithTerritory extends Employee
{
protected $territory;

    /**
     * Employee.class.classWithTerritory constructor.
     * @param $territory
     */
    public function __construct($empLastName, $empFirstName, $empSalary,$territory)
    {
        //Passes required arguments to the parent/super class custom constructor
        parent::__construct($empLastName, $empFirstName, $empSalary);

        //private parent/super class members/attributes can be accessed directly
        // //from within the class itself when magic method are implemented in the parent/super class
//        $this->empFirstname = $empFirstName;
//        $this->empSalary = $empSalary;
//        $this->emplastname = $empLastName;
        $this->territory = $territory;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        //Ovverride parent class toString and append territory
        return parent::__toString()."Employee.class Territory: ".$this->territory."<br/>";
    }


    /**
     * @return mixed
     */
    public function getTerritory()
    {
        return $this->territory;
    }

    /**
     * @param mixed $territory
     */
    public function setTerritory($territory): void
    {
        $this->territory = $territory;
    }

}