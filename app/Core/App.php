<?php

namespace App\Core;

class App
{
    private static $instance;
    private $config;
    private $database;
    private $router;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->database = new Database($config['database']);
        $this->router = new Router();
        self::$instance = $this;
    }

    public static function getInstance(): self
    {
        return self::$instance;
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

    public function getRouter(): Router
    {
        return $this->router;
    }
}

