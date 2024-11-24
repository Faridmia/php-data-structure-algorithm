<?php 

    class Product {

        public function __construct( 
            public string $name,
            public float $price
        ) {
            $this->price += $this->price * 0.15;
        }
    }

    $product = new Product("Laptop", 75000);

    echo $product->name;
    echo $product->price;
    

?>