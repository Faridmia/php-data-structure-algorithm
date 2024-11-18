<?php

// Write a program which will count the "r" characters in the text "w3resource".

$string = 'w3resource';

$count = 0;

$searchText = 'r';

for( $i = 0; $i < strlen( $string); $i++ ) {

    if( substr( $string, $i, 1 ) == $searchText) {
        $count += 1;
    }
}

// Print the count of occurrences of the search character
echo $count."\n";