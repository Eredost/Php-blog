<?php

namespace Blog\Exceptions;

class NotFoundException extends HttpException
{
    public function __construct($message, $code = 404, Exception $previous = null)
    {
        http_response_code($code);
        parent::__construct($message, $code, $previous);
    }

    public function renderTemplate()
    {
        $this->render('error404', [
            'message' => $this->message,
        ]);
    }
}
