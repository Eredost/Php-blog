<?php

namespace Blog\Utils;

class Request
{
    public static function request()
    {
        return $_POST;
    }

    public static function baseURI()
    {
        return $_SERVER['BASE_URI'] ?? '';
    }

    public static function isMethod(string $method)
    {
        return $_SERVER['REQUEST_METHOD'] === strtoupper($method);
    }
}
