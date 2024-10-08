<?php

//  Write a class called 'Logger' with a static property called 'logCount' that keeps track of the number of log messages. Implement a static method to log a message.


class Logger {
    public static $logCount = 0;

    public static function logcount( ) {
        self::$logCount++;

        echo "tract logcount: " . self::$logCount;
    }
}

Logger::logcount("log message 1");
Logger::logcount("log message 2");
Logger::logcount("log message 3");

echo "Total log count: " . Logger::$logCount . "</br>";