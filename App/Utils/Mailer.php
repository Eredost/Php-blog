<?php

namespace Blog\Utils;

class Mailer
{
    private const ADMIN_EMAIL = 'hello@michael-dev.fr';

    /**
     * Sends an email to the administration containing the data sent via the contact form
     *
     * @param array $fields The values of the form input fields
     *
     * @return bool
     */
    public static function sendContactMessage(array $fields): bool
    {
        $headers = 'From: hello@michael-dev.fr';
        $content = '
            <h1>Michael-dev</h1>
            <p>Nouveau message d\'un utilisateur</p>
        ';

        foreach ($fields as $fieldName => $value) {
            $content .= '<h2>$fieldName</h2> 
                <p>' . htmlspecialchars($value) . '</p>
            ';
        }

        return mail(self::ADMIN_EMAIL, 'Nouveau message', '$content', $headers);
    }
}
