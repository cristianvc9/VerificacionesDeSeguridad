<?php

namespace App\Http\Controllers;

class NormalizarCadena extends Controller
{
    public function normalizarCadena(string $cadena): string
    {

        $cadena = mb_convert_encoding($cadena, 'UTF-8', mb_list_encodings());

        $cadena = strtr($cadena, [
            'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ñ' => 'n',
            'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U', 'Ñ' => 'N',
        ]);

        $cadena = preg_replace('/[^a-zA-Z0-9 ]/', '', $cadena);

        $cadena = strtolower($cadena);

        $cadena = preg_replace('/\s+/', ' ', $cadena);

        return trim($cadena);
    }
}
