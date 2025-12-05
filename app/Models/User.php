<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    //SHARON
    public function obtenerIniciales(): string
    {
        // 1. Limpia espacios en blanco al inicio y final del nombre
        $nombreCompleto = trim($this->name);
        
        // 2. Divide el nombre en partes (palabras) usando el espacio como separador
        $partes = explode(' ', $nombreCompleto);
        $iniciales = '';

        // Si hay al menos dos palabras (nombre y apellido)
        if (count($partes) >= 2) {
            // Toma la primera letra de la primera palabra (partes[0])
            $iniciales .= strtoupper(substr($partes[0], 0, 1));
            // Toma la primera letra de la ÚLTIMA palabra (end($partes))
            $iniciales .= strtoupper(substr(end($partes), 0, 1));
        } elseif (count($partes) === 1 && !empty($partes[0])) {
            // Si solo hay una palabra, toma las dos primeras letras de esa palabra
            $iniciales = strtoupper(substr($partes[0], 0, 2));
        }
        
        return $iniciales;
    }

}
