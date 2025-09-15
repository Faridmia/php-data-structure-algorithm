<?php 
class Singleton {
    private static $instance = null; // static property (একটা shared জায়গা)
    public $property;

    // constructor private করে দেওয়া হলো, তাই new Singleton() করা যাবে না
    private function __construct() {}

    // Factory Method
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

// ব্যবহার
$a = Singleton::getInstance();
$b = Singleton::getInstance();

$a->property = "hello world";

echo $b->property; // output: hello world
