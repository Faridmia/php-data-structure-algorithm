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
