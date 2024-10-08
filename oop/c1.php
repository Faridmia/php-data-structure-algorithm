<?php

// Write a class called 'Math' with static methods like 'add()', 'subtract()', and 'multiply()'. Use these methods to perform mathematical calculations.


class Math {

    public static function add( $num1, $num2 ) {

        return $num1 + $num2;
    }

    public static function subtract( $num1, $num2 ) {

        return $num1 - $num2;
    }

    public static function multiply( $num1, $num2 ) {

        return $num1 * $num2;
    }

    // optional parameter

    public static function division( $num1, $num2 ) {

        if( $num2 == 0 ) {
            return "Division by zero error";
        }

        return $num1 / $num2;
    }
}

echo "Addition:" . Math::add(50, 7);
echo "subtract:" . Math::subtract(50, 7);
echo "multiply:" . Math::multiply(50, 7);
echo "division:" . Math::division(50, 7);