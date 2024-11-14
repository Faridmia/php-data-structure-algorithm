<?php 

// *                                                           
// * *                                                         
// * * *                                                       
// * * * *                                                     
// * * * * *


for( $x = 1; $x <= 5; $x++ ) {

    for( $y = 1; $y <= $x; $y++ ) {
        echo "*";

        if( $y < $x ) {
            echo " ";
        } 
    }
    echo "\n";
}

// *                                                          
//  *  *                                                       
//  *  *  *                                                    
//  *  *  *  *                                                 
//  *  *  *  *  *                                              
//  *  *  *  *  *                                              
//  *  *  *  *                                                 
//  *  *  *                                                    
//  *  *                                                       
//  * 


$total = 0;

for( $n = 1; $n <= 10; $n++ ) {
    if( $n <= 5) {
        $total = $n;
    }

    if( $n >= 6 ) {
        $total = 10 - $n;
    }

    for( $j = 1; $j <= $total; $j++) {
        echo " * ";
    }

    echo "\n";
}


// Define the number of rows
$n = 5;

// Loop to print the upper half of the diamond
for($i=1; $i<=$n; $i++)
{
    // Loop to print the spaces and stars for each row
    for($j=1; $j<=$i; $j++)
    {
        // Print a star surrounded by spaces
        echo ' * ';
    }
    // Move to the next line after printing each row
    echo "\n";
}

// Loop to print the lower half of the diamond
for($i=$n; $i>=1; $i--)
{
    // Loop to print the spaces and stars for each row
    for($j=1; $j<=$i; $j++)
    {
        // Print a star surrounded by spaces
        echo ' * ';
    }
    // Move to the next line after printing each row
    echo "\n";
}