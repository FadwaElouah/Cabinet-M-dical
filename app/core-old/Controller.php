<?php
class Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model($this->db);
    }

    protected function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    protected function sanitizeInput($data)
    {
        return htmlspecialchars(strip_tags($data));
    }

    protected function validateCSRF()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die("CSRF token validation failed");
            }
        }
    }
}

