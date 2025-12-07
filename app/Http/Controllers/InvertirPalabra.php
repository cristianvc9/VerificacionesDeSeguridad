<?php

namespace App\Http\Controllers;

class InvertirPalabra extends Controller
{
    public function invertir(string $texto): string
    {
        $caracteres = [];
        $invertida = '';

        for ($i = 0; isset($texto[$i]); $i++) {
            $caracteres[] = $texto[$i];
        }

        $total = count($caracteres);

        for ($j = 0; $j < $total; $j++) {
            $ultimo = $caracteres[$total - 1 - $j];
            $invertida = $invertida.$ultimo;
        }

        return $invertida;
    }
}
