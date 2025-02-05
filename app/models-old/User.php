<?php
class User {
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        return $this->db->query($sql, [$username, $email, $hashedPassword]);
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $user = $this->db->query($sql, [$email])->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_type'] = $user['user_type'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
        return true;
    }
}

