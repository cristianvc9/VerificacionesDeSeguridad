<?php

namespace App\Http\Controllers;

class InicialesController extends Controller
{
    public function obtenerIniciales(string $fullName): string
    {
        $name = preg_replace('/\s+/', ' ', $fullName);
        $name = trim($name); 
        
        $parts = explode(' ', $name);
        $initials = '';

        if (empty($name)) {
            return '';
        }

        if (count($parts) >= 2) {
            $initials .= strtoupper(mb_substr($parts[0], 0, 1));
            $initials .= strtoupper(mb_substr(end($parts), 0, 1));
        } elseif (!empty($parts[0])) {
            $initials = strtoupper(mb_substr($parts[0], 0, 2));
        }
        
        return $initials;
    }
}