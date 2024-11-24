<?php 

function processNumber( int | float $number ) : int | float {
    return $number * 2 ."\n";
}

echo  processNumber(5);
echo  processNumber(2.5);

$status = 200;

$message = match ($status) {
    200 => 'ok',
    400 => 'not found',
    500 => 'server error',
    default => 'unknown status'
    
};

echo $message; //


class Product {
    public function __construct(
        public string $name,
        public float $price
    ) {
        
        if ($this->price <= 0) {
            throw new InvalidArgumentException("Price must be greater than zero.");
        }
    }
}

try {
    $product = new Product("Laptop", 75000);
    echo $product->name;  
    echo $product->price; 
} catch (Exception $e) {
    echo $e->getMessage();
}

