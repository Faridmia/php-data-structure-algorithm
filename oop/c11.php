<?php

// Write a class called 'Validation' with static methods to validate  email addresses, passwords, and other common input fields.

class Validation {

    public static function validateEmail( $email ) {

        return filter_var( $email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validatePassword( $password ) {
        
        return strlen( $password ) >= 8;
    }

    public static function validateInput() {
        // Here's an example that checks if the field is not empty
        return !empty($field);
    }
}


$email = "admin@example.com";
$password = "password123";
$field = "";

if( Validation::validateEmail( $email ) ) {
    echo "email is vaild \n";
} else {
    echo "email is invalid";
}

if( Validation::validatePassword( $password ) ) {
    echo "password is valid \n";
} else {
    echo "password is invalid";
}

if( Validation::validateInput( $field ) ) {
    echo "input is valid \n";
} else {
    echo "input is invalid";
}