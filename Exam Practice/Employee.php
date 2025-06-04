<?php

class Person {
    public $name;
    public $age;

    // Constructor to initialize name and age
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Method to display person details
    public function displayPersonDetails() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
    }
}
class Employee extends Person {
    public $salary;
    public $position;

    // Constructor to initialize name, age, salary, and position
    public function __construct($name, $age, $salary, $position) {
        parent::__construct($name, $age); // Call parent constructor
        $this->salary = $salary;
        $this->position = $position;
    }

    // Method to display employee details
    public function displayEmployeeDetails() {
        $this->displayPersonDetails(); // Call parent method
        echo "Position: " . $this->position . "<br>";
        echo "Salary: ₹" . number_format($this->salary, 2) . "<br>";
    }
}
// Create an Employee object
$employee1 = new Employee("Tejas Kapse", 25, 50000, "Software Developer");

// Display employee details
$employee1->displayEmployeeDetails();
?>