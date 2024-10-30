<?php 

    class Vehicle {

        protected $brand;
        protected $model;
        protected $year;

        public function __construct( $brand, $model, $year ) {

            $this->brand = $brand;
            $this->model = $model;
            $this->year  = $year;

        }

        public function displayDetails() {

            echo "brand: " . $this->brand . "\n";
            echo "model: " . $this->model . "\n";
            echo "year: " . $this->year . "\n";
        }

    }

    $car = new Vehicle("Ford","F-150","2024");

    $car->displayDetails();

?>