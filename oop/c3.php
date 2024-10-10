<?php

// Write a PHP class called 'ShoppingCart' with properties like 'items' and 'total'. Implement methods to add items to the  cart and calculate the total cost.


class ShoppingCart {

    private $items;
    private $total;

    public function __construct() {
        $this->items = [];
        $this->total = 0;

    }


    public function getTotal() {
        return $this->total;
    }

    // Method to add an item to the cart
    public function addItem($itemName, $price, $quantity = 1)
    {
        // Check if item already exists, update quantity if it does
        if (isset($this->items[$itemName])) {
            $this->items[$itemName]['quantity'] += $quantity;
        } else {
            // Add new item
            $this->items[$itemName] = [
                'price' => $price,
                'quantity' => $quantity,
            ];
        }
        // Recalculate the total after adding an item
        $this->calculateTotal();
    }

     // Method to calculate the total cost of all items in the cart
     private function calculateTotal()
     {
         $this->total = 0; // Reset total
         foreach ($this->items as $item) {
             $this->total += $item['price'] * $item['quantity'];
         }
     }

    // Method to display the items in the cart
    public function getItems()
    {
        return $this->items;
    }

}


// Usage example
$cart = new ShoppingCart();
$cart->addItem('Apple', 0.99, 3); // Adds 3 Apples to the cart
$cart->addItem('Banana', 0.59, 2); // Adds 2 Bananas to the cart
$cart->addItem('Apple', 0.99, 2); // Adds 2 more Apples to the cart

echo "Total: $" . $cart->getTotal(); // Output the total cost
print_r($cart->getItems()); // Display items in the cart