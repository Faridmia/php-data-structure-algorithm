<?php 

$animals = ['dog', 'cat', 'cow', 'duck'];
$animal = array_find($animals, fn (string $value) => str_starts_with($value, 'c'));
echo $animal ."\n"; // cat


class User {
    public function __toString(): string {
        return "This is a User object 34445454.";
    }
}

$user = new User();
echo $user; // Output: This is a User object.


// Named Arguments 

function greet( string $name, int $age ) {

    echo  "hello {$name} you are {$age} years old\n";
}

greet( age: 20, name: 'faridmia');


function add(int $a, int $b) {
    return $a + $b;
}

echo add("10", "20"); // Output: Fatal error with detailed message
