<?php 

// Write a class called 'Employee' that extends the 'Person' class and adds properties like 'salary' and 'position'. Implement methods to display employee details.

class Person  {

    protected $name;
    protected $age;

    public function __construct( $name, $age ) {
        $this->name = $name;
        $this->age  = $age;
    }

    public function __toString() {
        return $this->name . " " . $this->age;
    }
}

class Employee extends Person {

    private $sallery;
    private $position;

    public function __construct( $name, $age, $sallery, $position ) {

        parent::__construct( $name, $age );
        $this->sallery   = $sallery;
        $this->position  = $position;

    }

    public function getSallery() {
        return $this->sallery;
    }

    public function getPosition() {
        return $this->position;
    }

    public function employeeDetails() {

        echo $this->name . " " . $this->age . " " . $this->sallery . " " . $this->position;
    }


}


$object = new Employee("farid mia", 30, 45000, 'Software Engineer');

$object->employeeDetails();