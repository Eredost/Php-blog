<?php

namespace Blog;

use AttributesRouter\Router;
use Blog\Controllers\AdminController;
use Blog\Controllers\MainController;
use Blog\Controllers\PostController;
use Blog\Controllers\SecurityController;
use Blog\Exceptions\NotFoundException;
use Blog\Utils\Request;

final class App
{
    /** @var Router $router */
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
        $this->router = new Router();
        $this->request = new Request();
        $this->router->setBaseURI($this->request->baseURI());
        $this->initRouter();
    }

    /**
     * Singleton method
     *
     * @return App
     */
    public static function getInstance(): App
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
     * @throws NotFoundException when the requested page does not exist
     */
    public function handleRequest()
    {
        $match = $this->router->match();

        if (!$match) {

            throw new NotFoundException('La page que vous recherchez n\'existe pas');
        }

        $controller = new $match['class']($this->router, $this->request);
        $controller->{$match['method']}($match['params']);
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
        $this->router->addRoutes([
            MainController::class,
            PostController::class,
            SecurityController::class,
            AdminController::class,
        ]);
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }
}
