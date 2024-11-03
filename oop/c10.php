<?php 

// Write a PHP class called 'Logger' that uses the singleton design pattern to ensure only one instance of the class can be created.

class Logger {

    private static $instance;
    private $logs;

    public function __construct() {
        $this->logs = [];
    }

    public static function getInstance() {

        if( self::$instance === null ) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    public function log( $message ) {
        $this->logs[] = $message;
    }

    public function getLogs() {
        return $this->logs;
    }
}

$logger = Logger::getInstance();

$logger->log("log message 1");
$logger->log("log message 2");

$logs = $logger->getLogs();

foreach( $logs as $log ) {
    echo $log . "\n";
}