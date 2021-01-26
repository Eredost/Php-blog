<?php

namespace Blog\Exceptions;

class AccessDeniedException extends HttpException
{
    public function __construct($message, $code = 403, Exception $previous = null)
    {
        http_response_code($code);
        parent::__construct($message, $code, $previous);
    }

    public function renderTemplate()
    {
        $this->render('error403', [
            'message' => $this->message,
        ]);
    }
}
