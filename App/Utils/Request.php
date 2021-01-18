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

    /** @var array $session */
    private $session;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->server = $_SERVER;
        $this->session = &$_SESSION;
    }

    /**
     * Retrieves data from the GET superglobal
     *
     * @return array
     */
    public function query(): array
    {
        return $this->get;
    }

    /**
     * Retrieves data from the POST superglobal
     *
     * @return array
     */
    public function request(): array
    {
        return $this->post;
    }

    /**
     * Get the base path of the application
     *
     * @return string
     */
    public function baseURI(): string
    {
        return $this->server['BASE_URI'] ?? '';
    }

    /**
     * Checks if the method provided match the one requested by the client
     *
     * @param string $method
     *
     * @return bool
     */
    public function isMethod(string $method): bool
    {
        return $this->server['REQUEST_METHOD'] === strtoupper($method);
    }

    /**
     * Adds a flash message to the POST superglobal
     *
     * @param string $key     The key used to retrieve the flash message
     * @param string $message Message displayed
     */
    public function addFlashMessage(string $key, string $message): void
    {
        $this->session['flashMessages'][$key] = $message;
    }

    /**
     * Retrieves the flash message associated with the keys and deletes it from the POST superglobal
     *
     * @param array $keys The keys used to retrieve the flash message
     *
     * @return array|null
     */
    public function getFlashMessage(array $keys): ?array
    {
        $messages = [];

        foreach ($keys as $key) {
            if (isset($this->session['flashMessages']) && array_key_exists($key, $this->session['flashMessages'])) {
                $messages[$key] = $this->session['flashMessages'][$key];
                unset($this->session['flashMessages'][$key]);
            }
        }

        return $messages;
    }
}
