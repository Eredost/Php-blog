<?php

namespace Blog;

use \AltoRouter;
use Blog\Utils\Request;

final class App
{
    /** @var AltoRouter $router */
    private $router;

    /** @var Request $request */
    private $request;

    /** @var App $instance */
    private static $instance;

    /**
     * App constructor.
     *
     * @throws \Exception
     */
    private function __construct()
    {
        $this->router = new AltoRouter();
        $this->request = new Request();
        $this->router->setBasePath($this->request->baseURI());
        $this->initRouter();
    }

    /**
     * Singleton method
     *
     * @return App
     *
     * @throws \Exception
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
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

        $controller = new $controllerName($this->router, $this->request);
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
        $this->router->map(
            'GET|POST',
            '/blog/[i:postId]',
            'Blog\Controllers\PostController#articleShow',
            'articleShow'
        );
        $this->router->map(
            'GET',
            '/blog',
            'Blog\Controllers\PostController#articleList',
            'articleList'
        );
        $this->router->map(
            'GET|POST',
            '/admin/article',
            'Blog\Controllers\AdminController#addArticle',
            'addArticle'
        );
        $this->router->map(
            'GET',
            '/admin',
            'Blog\Controllers\AdminController#adminShow',
            'adminShow'
        );
    }
}
