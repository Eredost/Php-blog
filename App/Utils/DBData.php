<?php

namespace Blog\Utils;

use \PDO;

class DBData
{
    /** @var PDO $dbh */
    private $dbh;

    /** @var DBData $instance */
    private static $instance;

    /**
     * Establishes the connection to the database using the config file
     */
    private function __construct()
    {
        $config = parse_ini_file(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.conf');

        try {
            $this->dbh = new PDO(
                "mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']};charset=utf8",
                $config['DB_USERNAME'],
                $config['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );
        } catch (\Exception $e) {
            die(<<< HTML
                Erreur de connexion <br>
                {$e->getMessage()} <br>
                <pre>
                    {$e->getTraceAsString()}
                </pre>
HTML);
        }
    }

    /**
     * Singleton method
     *
     * @return PDO
     */
    public static function getDBH(): PDO
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance->dbh;
    }
}
