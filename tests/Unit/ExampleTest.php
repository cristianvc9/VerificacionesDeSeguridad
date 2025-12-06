<?php

namespace Tests\Unit;

use App\Http\Controllers\LoginController;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // LOGIN
    public function test_login_aprobado(): void
    {
        $controller = new LoginController;
        $result = $controller->login('equipo1@gmail.com', 'Equipo1-12345');

        $this->assertTrue($result);
    }

    public function test_login_contraseña_incorrecta(): void
    {
        $controller = new LoginController;
        $result = $controller->login('equipo1@gmail.com', 'Equipo1');

        $this->assertFalse($result);
    }

    public function test_login_email_incorrecto(): void
    {
        $controller = new LoginController;
        $result = $controller->login('equipo@gmail.com', 'Equipo1-12345');

        $this->assertFalse($result);
    }
}
