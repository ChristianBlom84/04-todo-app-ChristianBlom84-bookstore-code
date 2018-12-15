<?php

namespace Bookstore\Domain\Customer;

use Bookstore\Domain\Customer;

class CustomerFactory
{
    public static function factory(
        string $type, // 'basic' 'premium' 'gollum'
        int $id = null,
        string $firstname,
        string $surname,
        string $email
    ): Customer {
        $classname = __NAMESPACE__ . '\\' . ucfirst($type);
        if (!class_exists($classname)) {
            // finns ej...
            throw new \InvalidArgumentException('MEEEP, that was the wrong type. This is what you sent ' . $type);
        }
        // Instansiera rätt typ av kund klass (Basic || Premium);
        return new $classname($id, $firstname, $surname, $email);
    }
}
