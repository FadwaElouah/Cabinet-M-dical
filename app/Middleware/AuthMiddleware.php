<?php

namespace App\Middleware;

use App\Services\AuthService;

class AuthMiddleware
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function handle($request, $next)
    {
        if (!$this->authService->isLoggedIn()) {
            header('Location: /login');
            exit;
        }

        return $next($request);
    }
}

