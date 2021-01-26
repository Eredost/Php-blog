<?php

namespace Blog\Exceptions;

use Blog\App;
use Blog\Utils\Request;

abstract class HttpException extends \Exception
{
    /**
     * @param string $templateName The name of the template to display
     * @param array  $templateVars The variables used in the template
     */
    protected function render(string $templateName, array $templateVars = [])
    {
        $templateVars['request'] = new Request();
        $templateVars['router'] = App::getInstance()->getRouter();

        include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'exceptions' . DIRECTORY_SEPARATOR . $templateName . '.tpl.php';
    }

    abstract public function renderTemplate();
}
