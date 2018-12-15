<?php

namespace Bookstore\Utils;

abstract class Singleton
{
    private static $instances = array();

    public static function getInstance()
    {
        $class = get_called_class(); // t.ex. Config
        
        // If the class doesn't exist in the static array of instances
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }
        // Return the instance
        return self::$instances[$class];
    }
}
