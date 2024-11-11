<?php

// Create a  script using a for loop to add all the integers between 0 and 30 and display the sum.

$sum = 0;

for( $i = 1; $i <= 30; $i ++) {
    $sum += $i;
}

echo "The sum of the numbers 0 to 30 is: {$sum}";