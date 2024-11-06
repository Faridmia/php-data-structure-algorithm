<?php 

    // Create a  script that displays 1-2-3-4-5-6-7-8-9-10 on one line. There will be no hyphen(-) at starting and ending position.

    for( $x = 1; $x <= 10; $x++ ) {

        if( $x < 10 ) {
            echo "$x-";
        } else {
            echo $x."\n";
        }
    }

    // Create a  script using a for loop to add all the integers between 0 and 30 and display the sum.

    $sum = 0;

    for( $i = 1; $i<= 30; $i++ ) {
        $sum += $i;
    }

    echo "total: " . $sum;

?>