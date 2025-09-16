<?php 
//সবসময় নতুন ডাটা আনতে বাধ্য করতে চাইলে:
function http_1_0_nocache_headers() {
    $pretty_modtime = gmdate('D, d M Y H:i:s') . ' GMT';
    header("Last-Modified: $pretty_modtime");
    header("Expires: $pretty_modtime");
    header("Pragma: no-cache");
}


// 👉 এতে ব্রাউজার প্রতিবার নতুন কপি চাইবে।

// যদি শেষবার কখন আপডেট হয়েছে সেটা জানেন:
function validate_cache_headers($my_modtime) {
    $pretty_modtime = gmdate('D, d M Y H:i:s', $my_modtime) . ' GMT';
    if ($_SERVER['IF_MODIFIED_SINCE'] == $pretty_modtime) {
        header("HTTP/1.1 304 Not Modified");
        exit;
    } else {
        header("Cache-Control: must-revalidate");
        header("Last-Modified: $pretty_modtime");
    }
}

// যদি cache এ থাকা ডাটা আপডেটেড থাকে তাহলে সার্ভার শুধু 304 পাঠাবে, নতুন HTML পাঠাবে না।


নির্দিষ্ট সময় cache রাখতে চাইলে:
function cache_novalidate($interval = 60) {
    $now = time();
    $pretty_lmtime = gmdate('D, d M Y H:i:s', $now) . ' GMT';
    $pretty_extime = gmdate('D, d M Y H:i:s', $now + $interval) . ' GMT';
    
    header("Last-Modified: $pretty_lmtime");
    header("Expires: $pretty_extime");
    header("Cache-Control: public,max-age=$interval");
}


👉 এতে পেজ ৬০ সেকেন্ড পর্যন্ত cache থাকবে।

  শুধু ব্রাউজারে cache হবে (proxy cache এ না):
function cache_browser($interval = 60) {
    $now = time();
    $pretty_lmtime = gmdate('D, d M Y H:i:s', $now) . ' GMT';
    $pretty_extime = gmdate('D, d M Y H:i:s', $now + $interval) . ' GMT';
    
    header("Last-Modified: $pretty_lmtime");
    header("Expires: $pretty_extime");
    header("Cache-Control: private,max-age=$interval,s-maxage=0");
}


একেবারে cache না করতে চাইলে:
function cache_none() {
    header("Expires: 0");
    header("Pragma: no-cache");
    header("Cache-Control: no-cache,no-store,max-age=0,s-maxage=0,must-revalidate");
}


Content Compression (gzip)

ডাটা ছোট করে পাঠানো হয় → ব্যান্ডউইথ বাঁচে, স্পিড বাড়ে।

PHP তে সহজ উপায়:

zlib.output_compression = On




<?php ob_start(); ?>
<HTML>
 <BODY>
 Today is <?= strftime("%A, %B %e %Y") ?> 
 </BODY>
</HTML>
<?php
$output = ob_get_contents(); 
ob_end_flush();
cache($output);
?>
ob_start() → আউটপুট বাফারে জমা রাখবে

ob_get_contents() → বাফার থেকে কনটেন্ট বের করবে

ob_end_flush() → বাফারের কনটেন্ট ক্লায়েন্টে পাঠাবে

ob_end_clean() → কনটেন্ট মুছে ফেলবে


// flat cache 

$cache_file = __DIR__ . "/cache/products.cache";
$cache_lifetime = 120; // 2 মিনিট cache

if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_lifetime) {
    // cache থেকে পড়
    $products = unserialize(file_get_contents($cache_file));
} else {
    // database query (example)
    $mysqli = new mysqli("localhost", "root", "", "shop");
    $result = $mysqli->query("SELECT id, name, price FROM products LIMIT 10");

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // cache এ save করো
    file_put_contents($cache_file, serialize($products));
}

// output দেখাও
foreach ($products as $p) {
    echo $p['name'] . " - $" . $p['price'] . "<br>";
}

Example 1: Simple Cache File Save & Load
<?php
$cache_file = __DIR__ . '/cache/home.cache';
$cache_lifetime = 60; // cache valid থাকবে 60 সেকেন্ড

// cache file আছে এবং এখনও valid?
if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_lifetime) {
    // cache থেকে data load
    echo file_get_contents($cache_file);
} else {
    // নতুন data generate
    ob_start();
    echo "<h1>Welcome to my site!</h1>";
    echo "<p>Current Time: " . date("H:i:s") . "</p>";
    $output = ob_get_clean();

    // cache এ লিখে রাখো
    file_put_contents($cache_file, $output);

    // user কে দেখাও
    echo $output;
}


👉 এখানে প্রথমবার script চালালে file বানাবে, পরের 60 সেকেন্ডের মধ্যে আবার call করলে শুধু cache file serve হবে (database hit হবে না)।

🟠 Example 2: Database Query Result Cache
<?php
$cache_file = __DIR__ . "/cache/products.cache";
$cache_lifetime = 120; // 2 মিনিট cache

if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_lifetime) {
    // cache থেকে পড়
    $products = unserialize(file_get_contents($cache_file));
} else {
    // database query (example)
    $mysqli = new mysqli("localhost", "root", "", "shop");
    $result = $mysqli->query("SELECT id, name, price FROM products LIMIT 10");

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // cache এ save করো
    file_put_contents($cache_file, serialize($products));
}

// output দেখাও
foreach ($products as $p) {
    echo $p['name'] . " - $" . $p['price'] . "<br>";
}


👉 এখানে database hit না করেও বারবার product list দেখাতে পারবেন।

🔵 Example 3: File Lock (Concurrency সমস্যা এড়ানো)
<?php
$cache_file = __DIR__ . "/cache/page.cache";

$data = "<p>Generated at " . date("H:i:s") . "</p>";

// file write করার সময় lock করো
$fp = fopen($cache_file, "c+");
if (flock($fp, LOCK_EX)) { // exclusive lock
    ftruncate($fp, 0); // আগের data clear
    fwrite($fp, $data);
    fflush($fp); // write flush
    flock($fp, LOCK_UN); // unlock
}
fclose($fp);

echo "Cache Updated!";


👉 এর ফলে যদি একসাথে দুইটা request আসে, data corrupt হবে না।

🔴 Example 4: Safe File Swap (Atomic Cache Update)
<?php
$cache_file = __DIR__ . "/cache/page.cache";
$temp_file  = $cache_file . ".tmp";

// নতুন data generate
$data = "<p>Updated at " . date("H:i:s") . "</p>";

// আগে temp file এ লিখো
file_put_contents($temp_file, $data);

// শেষে rename() করে আসল cache replace করো
rename($temp_file, $cache_file);

echo "Cache swapped safely!";


👉 এখানে rename() atomic operation → মানে পুরানো cache replace হবে একসাথে। মাঝপথে corrupt হবে না।
