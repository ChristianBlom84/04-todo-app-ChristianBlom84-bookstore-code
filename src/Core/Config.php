<?php

namespace Bookstore\Core;

use Bookstore\Utils\Singleton;
use Bookstore\Exceptions\KeyWasNotFoundInJsonConfigException;

class Config extends Singleton
{
    private $data;

    protected function __construct()
    {
        $json = file_get_contents(__DIR__ . '/../../config/app.json');
        $this->data = json_decode($json, true);
    }

    public function get($key)
    {
        if (!isset($this->data[$key])) {
            // kasta fel... nyckeln hittades inte i json-filen
            throw new KeyWasNotFoundInJsonConfigException("Key $key was not found in config.");
        }
        return $this->data[$key];
    }

}

