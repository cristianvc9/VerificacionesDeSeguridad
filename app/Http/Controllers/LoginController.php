<?php

namespace App\Http\Controllers;

class LoginController extends Controller
{
    /**
     * @var array{email: string, password: string}
     */
    private array $user = [
        'email' => 'equipo1@gmail.com',
        'password' => 'Equipo1-12345'
    ];

    public function login(string $email, string $password): bool
    {
        return $email === $this->user['email'] &&
               $password === $this->user['password'];
    }
}
