<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase; 
use App\Models\User;

class UserTest extends TestCase
{
    #[test]
    public function el_metodo_obtener_iniciales_funciona_con_nombre_y_apellido()
    {
        $user = User::factory()->make([
            'name' => 'Ana Sofia Garcia', 
        ]);

        $iniciales = $user->obtenerIniciales();

        $this->assertEquals('AG', $iniciales);
    }
    
    #[test]
    public function el_metodo_obtener_iniciales_maneja_espacios_extra_o_minusculas()
    {
        $user = User::factory()->make([
            'name' => '  pablo de la cruz ',
        ]);
        
        $iniciales = $user->obtenerIniciales();

        $this->assertEquals('PC', $iniciales);
    }

    #[test]
    public function el_metodo_obtener_iniciales_maneja_un_solo_nombre()
    {
        $user = User::factory()->make([
            'name' => 'Carlos',
        ]);
        
        $iniciales = $user->obtenerIniciales();

        $this->assertEquals('CA', $iniciales);
    }
}