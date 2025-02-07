<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController extends BaseController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->authService->login($email, $password)) {
                $this->redirect('/dashboard');
            } else {
                $error = "Email ou mot de passe incorrect";
                $this->render('auth/login', ['error' => $error]);
            }
        }

        $this->render('auth/login');
    }

    public function logout()
    {
        $this->authService->logout();
        $this->redirect('/login');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($password !== $confirmPassword) {
                $error = "Les mots de passe ne correspondent pas";
                $this->render('auth/register', ['error' => $error]);
                return;
            }

            $user = new User(null, $email, password_hash($password, PASSWORD_DEFAULT), 'patient');
            if ($user->save()) {
                $this->authService->login($email, $password);
                $this->redirect('/dashboard');
            } else {
                $error = "Erreur lors de l'inscription";
                $this->render('auth/register', ['error' => $error]);
            }
        }

        $this->render('auth/register');
    }
}

