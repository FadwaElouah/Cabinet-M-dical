<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    public function login($email, $password): bool
    {
        $user = User::getByEmail($email);
        if ($user && password_verify($password, $user->getPassword())) {
            $_SESSION['user_id'] = $user->getId();
            return true;
        }
        return false;
    }

    public function logout(): void
    {
        unset($_SESSION['user_id']);
        session_destroy();
    }

    public function getCurrentUser(): ?User
    {
        if (isset($_SESSION['user_id'])) {
            return User::getById($_SESSION['user_id']);
        }
        return null;
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['user_id']);
    }
}

