<?php
class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            $userType = $_POST['user_type']; // 'patient', 'doctor', or 'admin'
            $userClass = ucfirst($userType);
            require_once "../app/models/{$userClass}.php";
            
            $user = new $userClass($this->db);
            
            if ($user->login($email, $password)) {
                header('Location: /dashboard');
                exit;
            } else {
                return ['error' => 'Email ou mot de passe incorrect'];
            }
        }
        
        // Afficher le formulaire de connexion
        require_once '../app/views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            
            // Par défaut, on enregistre un nouveau patient
            $patient = new Patient($this->db);
            
            if ($patient->register($username, $email, $password)) {
                header('Location: /login');
                exit;
            } else {
                return ['error' => 'Erreur lors de l\'inscription'];
            }
        }
        
        // Afficher le formulaire d'inscription
        require_once '../app/views/auth/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit;
    }
}

