<?php

namespace Blog\Utils;

use Blog\Models\User;

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

        if (!$this->getCsrfToken()) {
            $this->generateCsrfToken();
        }
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
     * Generate a new CSRF token with a random hexadecimal string
     *
     * @throws \Exception
     */
    private function generateCsrfToken(): void
    {
        $this->session['csrfToken'] = bin2hex(random_bytes(32));
    }

    /**
     * @return string|null
     */
    public function getCsrfToken(): ?string
    {
        return $this->session['csrfToken'] ?? null;
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

    /**
     * Checks if the user is present in the SESSION superglobal and therefore
     * connected to the application
     *
     * @return bool
     */
    public function isAuthenticated(): bool
    {
        return isset($this->session, $this->session['user'])
            && $this->session['user'] instanceof User
        ;
    }

    /**
     * Retrieves the user logged in to the application
     *
     * @return User|null Object representing the current user
     */
    public function getCurrentUser(): ?User
    {
        if ($this->isAuthenticated()) {

            return $this->session['user'];
        }

        return null;
    }

    /**
     * Check if the user has the role
     *
     * @param string $role
     *
     * @return bool
     */
    public function isGranted(string $role): bool
    {
        $user = $this->getCurrentUser();

        return $user
            && in_array($role, json_decode($user->getRole()))
        ;
    }

    /**
     * @param User $user
     */
    public function setCurrentUser(User $user): void
    {
        $this->session['user'] = $user;
    }
}
