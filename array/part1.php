<?php 

$animals = ['dog', 'cat', 'cow', 'duck'];
$animal = array_find($animals, fn (string $value) => str_starts_with($value, 'c'));
echo $animal; // cat

