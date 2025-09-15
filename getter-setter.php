

<?php
class WP_Config {
    // option prefix (avoid conflict)
    private $prefix = 'myplugin_';

    // যখন property set করা হবে → option save হবে
    public function __set($name, $value) {
        update_option($this->prefix . $name, $value);
    }

    // যখন property get করা হবে → option read হবে
    public function __get($name) {
        return get_option($this->prefix . $name, null);
    }
}

// ব্যবহার
$config = new WP_Config;

// option set করা হলো
$config->site_name = "My Custom WP Site";
$config->admin_email = "admin@example.com";

// option get করা হলো
echo $config->site_name;   // My Custom WP Site
echo "\n";
echo $config->admin_email; // admin@example.com



class Config {
    private $data = [];

    // property set করলে
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    // property get করলে
    public function __get($name) {
        return $this->data[$name] ?? null;
    }
}

// ব্যবহার
$config = new Config;

// property set করলাম
$config->site_name = "My Awesome Site";
$config->admin_email = "admin@example.com";

// property get করলাম
echo $config->site_name;   // My Awesome Site
echo "\n";
echo $config->admin_email; // admin@example.com
