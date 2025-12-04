<?php

namespace App\Http\Controllers;

class FiltrarApellidos
{
    /**
     * Normaliza la cadena para evitar problemas con acentos o espacios.
     */
    private function normalize(string $string): string
    {
        // Elimina espacios extra y pone en UTF-8
        return trim($string);
    }

    /**
     * Filtra los nombres que contengan el apellido López
     *
     * @param  string[]  $nombres  Array de nombres completos
     * @return string[] Array con solo los que tienen "López"
     */
    public function filtrarLopez(array $nombres): array
    {
        $resultado = [];

        foreach ($nombres as $nombre) {
            $nombreNormalizado = $this->normalize($nombre);

            if (stripos($nombreNormalizado, 'López') !== false) {
                $resultado[] = $nombreNormalizado;
            }
        }

        return $resultado;
    }
}
