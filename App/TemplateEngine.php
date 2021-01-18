<?php

namespace Blog;

abstract class TemplateEngine
{
    /** @var \AltoRouter $router */
    protected $router;

    /**
     * TemplateEngine constructor.
     *
     * @param \AltoRouter $router
     */
    public function __construct(\AltoRouter $router)
    {
        $this->router = $router;
    }

    /**
     * Modify the HTTP Location header to redirect the client
     *
     * @param string $url
     */
    public function redirect(string $url)
    {
        header('Location: ' . $url);
    }

    /**
     * Allows rendering a template from a controller
     *
     * @param string $templateName The name of the template to display
     * @param array  $templateVars The variables used in the template
     */
    public function render(string $templateName, array $templateVars = [])
    {
        $templateVars['router'] = $this->router;

        include __DIR__ . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $templateName . '.tpl.php';
    }
}
