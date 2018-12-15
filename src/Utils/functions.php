<?php 

function getUri()
{
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    return $uri;
}

function getMethod()
{
    $method = $_SERVER['REQUEST_METHOD'];

    return $method;
}