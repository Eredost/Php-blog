<?php

namespace Blog;

use \AltoRouter;

final class App
{
    /** @var AltoRouter $router */
    private $router;

    /** @var App $instance */
    private static $instance;

    /**
     * App constructor.
     *
     * @param string $baseURI The base URI of the application
     *
     * @throws \Exception
     */
    private function __construct(string $baseURI)
    {
        $this->router = new AltoRouter();
        $this->router->setBasePath($baseURI);
        $this->initRouter();
    }

    /**
     * Singleton method
     *
     * @param string $baseURI The base URI of the application
     *
     * @return App
     *
     * @throws \Exception
     */
    public static function getInstance(string $baseURI)
    {
        if (empty(self::$instance)) {
            self::$instance = new self($baseURI);
        }

        return self::$instance;
    }

    /**
     * Check the url sent by the user for a match with the routes
     * initialized earlier. Calls the associated controller if a match occurs
     * or sent 404 error if not.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function handleRequest()
    {
        $match = $this->router->match();

        if (!$match) {

            throw new \Exception('No route matched !');
        }

        $controllerInfo = explode('#', $match['target']);
        $controllerName = $controllerInfo[0];
        $methodName = $controllerInfo[1];

        $controller = new $controllerName($this->router);
        $controller->$methodName($match['params']);
    }

    /**
     * Initialize all routes of the application
     *
     * @throws \Exception
     *
     * @return void
     */
    private function initRouter()
    {
        $this->router->map(
            'GET|POST',
            '/',
            'Blog\Controllers\MainController#home',
            'homepage'
        );
        $this->router->map(
            'GET',
            '/cv',
            'Blog\Controllers\MainController#showCV',
            'cv'
        );
        $this->router->map(
            'GET',
            '/mentions-legales',
            'Blog\Controllers\MainController#legalMentions',
            'legalMentions'
        );
        $this->router->map(
            'GET',
            '/politique-de-confidentialite',
            'Blog\Controllers\MainController#privacyPolicy',
            'privacyPolicy'
        );
        $this->router->map(
            'GET|POST',
            '/inscription',
            'Blog\Controllers\SecurityController#signup',
            'signup'
        );
        $this->router->map(
            'GET|POST',
            '/connexion',
            'Blog\Controllers\SecurityController#login',
            'login'
        );
        $this->router->map(
            'GET',
            '/deconnexion',
            'Blog\Controllers\SecurityController#disconnect',
            'disconnect'
        );
    }
}
