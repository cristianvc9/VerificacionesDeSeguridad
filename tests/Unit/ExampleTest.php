<?php

namespace Tests\Unit;

use App\Http\Controllers\FiltrarApellidos;
use App\Http\Controllers\LoginController;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

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

    // ============================================================================
    // PRUEBAS DEL FILTRO APELLIDO LÓPEZ
    // ============================================================================

    public function test_filtra_apellidos_lopez_correctamente()
    {
        $controller = new FiltrarApellidos;

        $nombres = [
            'Ana López',
            'Carlos Ramírez',
            'Pedro López',
            'Luis Méndez',
            'María López García',
            'Fernando Torres',
        ];

        $resultado = $controller->filtrarLopez($nombres);

        $this->assertEquals([
            'Ana López',
            'Pedro López',
            'María López García',
        ], $resultado);
    }
}
