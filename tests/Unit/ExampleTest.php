<?php

namespace Tests\Unit;

use App\Http\Controllers\FiltrarApellidos;
use App\Http\Controllers\InvertirPalabra;
use App\Http\Controllers\LoginController;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    // ============================================================================
    // PRUEBAS DE LOGIN
    // ============================================================================

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
    // PRUEBAS DEL FILTRO DE APELLIDO LÓPEZ
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

    // Pruebas iniciales de nombre
    public function el_metodo_obtener_iniciales_funciona_con_nombre_y_apellido()
    {
        $user = User::factory()->make([
            'name' => 'Ana Sofia Garcia',
        ]);

        $iniciales = $user->obtenerIniciales();

        $this->assertEquals('AG', $iniciales);
    }

    public function el_metodo_obtener_iniciales_maneja_espacios_extra_o_minusculas()
    {
        $user = User::factory()->make([
            'name' => '  pablo de la cruz ',
        ]);

        $iniciales = $user->obtenerIniciales();

        $this->assertEquals('PC', $iniciales);
    }

    public function el_metodo_obtener_iniciales_maneja_un_solo_nombre()
    {
        $user = User::factory()->make([
            'name' => 'Carlos',
        ]);

        $iniciales = $user->obtenerIniciales();

        $this->assertEquals('CA', $iniciales);
    }

    // Pruebas de palabra invertida
    public function test_palabra_invertida(): void
    {
        $controller = new InvertirPalabra;

        $result = $controller->Invertir(texto: 'atreup');

        $this->assertIsString($result);
        $this->assertEquals('puerta', $result);
        $this->assertNotEquals('atreup', $result);

    }
}
