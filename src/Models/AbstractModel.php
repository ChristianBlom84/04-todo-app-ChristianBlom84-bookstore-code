<?php

namespace Todo\Models;

use Todo\Core\Database;

abstract class AbstractModel
{
    protected static $db;

    /**
     * This method is called at the bottom of this file
     * to make sure our database singleton instance is set.
     *
     * @return void
     */
    public static function initialize()
    {
        if (!self::$db) {
            self::$db = Database::getInstance();
        }
    }
}

AbstractModel::initialize();
