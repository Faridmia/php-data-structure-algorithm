<?php 

// Write a PHP abstract class called 'Animal' with abstract methods like 'eat()' and 'makeSound()'. Create subclasses like 'Dog', 'Cat', and 'Bird' that implement these methods.

abstract class Animal {

    abstract function eat();
    abstract function makeSound();
}

class Dog extends Animal {

    public function eat() {
        echo "dogs is eating";
    }

    public function makeSound(){
        echo "Dog says: Woof Woof!\n";
    }
}

class Cat extends Animal {

    public function eat() {
        echo "Cat is eating";
    }

    public function makeSound(){
        echo "Cat says: Meow Meow!\n";
    }
}

class Bird extends Animal {

    public function eat() {
        echo "Bird is eating";
    }

    public function makeSound(){
        echo "Bird says: Chirp Chirp!\n";
    }
}

$dog = new Dog();

$dog->eat();
$dog->makeSound();

$Cat = new Cat();

$Cat->eat();
$Cat->makeSound();

$Bird = new Bird();

$Bird->eat();
$Bird->makeSound();