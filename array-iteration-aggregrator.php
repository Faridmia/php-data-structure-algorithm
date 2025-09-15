<?php 
interface ArrayAccess {
    function offsetExists($key);
    function offsetGet($key);
    function offsetSet($key, $value);
    function offsetUnset($key);
}


class WPSettings implements ArrayAccess {
    private $option_name = 'my_plugin_settings';
    private $data = [];

    public function __construct() {
        $this->data = get_option($this->option_name, []);
    }

    public function offsetExists($key) {
        return isset($this->data[$key]);
    }

    public function offsetGet($key) {
        return $this->data[$key] ?? null;
    }

    public function offsetSet($key, $value) {
        $this->data[$key] = $value;
        update_option($this->option_name, $this->data);
    }

    public function offsetUnset($key) {
        unset($this->data[$key]);
        update_option($this->option_name, $this->data);
    }
}

// ব্যবহার
$settings = new WPSettings;

// set করা
$settings['color'] = 'red';
$settings['font_size'] = 16;

// get করা
echo $settings['color']; // red

// check করা
if (isset($settings['font_size'])) {
    echo "Font size is set!";
}


class Config implements ArrayAccess {
    private $data = [];

    public function offsetExists($key) {
        return isset($this->data[$key]);
    }

    public function offsetGet($key) {
        return $this->data[$key] ?? null;
    }

    public function offsetSet($key, $value) {
        $this->data[$key] = $value;
    }

    public function offsetUnset($key) {
        unset($this->data[$key]);
    }
}

// ব্যবহার
$config = new Config;
$config['site'] = "My Blog";
echo $config['site']; // My Blog















class ProductCollection implements Iterator, ArrayAccess {
    private $items = [];
    private $position = 0;

    public function __construct($items) {
        $this->items = $items;
    }

    // Iterator methods
    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->items[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->items[$this->position]);
    }

    // ArrayAccess methods
    public function offsetExists($key) {
        return isset($this->items[$key]);
    }

    public function offsetGet($key) {
        return $this->items[$key] ?? null;
    }

    public function offsetSet($key, $value) {
        $this->items[$key] = $value;
    }

    public function offsetUnset($key) {
        unset($this->items[$key]);
    }
}

// ব্যবহার
$products = new ProductCollection([
    ['id' => 1, 'name' => 'T-shirt'],
    ['id' => 2, 'name' => 'Jeans'],
    ['id' => 3, 'name' => 'Shoes'],
]);

// foreach দিয়ে loop
foreach ($products as $p) {
    echo $p['name'] . "\n";
}

// Array এর মতো ব্যবহার
echo $products[1]['name']; // Jeans

// Add / Update
$products[3] = ['id' => 4, 'name' => 'Cap'];

// Unset
unset($products[0]);


