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



class Singleton {
private static $props = array();
public function _ _construct() {}
public function _ _get($name)
{
if(array_key_exists($name, self::$props)) {
return self::$props[$name];
}
}
public function _ _set($name, $value)
{
self::$props[$name] = $value;
}
}
$a = new Singleton;
$b = new Singleton;
$a->property = “hello world”;
print $b->property;
