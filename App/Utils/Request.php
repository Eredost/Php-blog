<?php

namespace Blog\Utils;

class Request
{
    /** @var array $post */
    private $post;

    /** @var array $get */
    private $get;

    /** @var array $server */
    private $server;

    public function __construct()
    {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->server = $_SERVER;
    }

    public function query(): array
    {
        return $this->get;
    }

    public function request(): array
    {
        return $this->post;
    }

    public function baseURI(): string
    {
        return $this->server['BASE_URI'] ?? '';
    }

    public function isMethod(string $method): bool
    {
        return $this->server['REQUEST_METHOD'] === strtoupper($method);
    }
}
