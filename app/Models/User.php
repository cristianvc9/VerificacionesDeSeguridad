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

    public function obtenerIniciales(): string
    {
        $nombreCompleto = trim($this->name);

        $partes = explode(' ', $nombreCompleto);
        $iniciales = '';

        if (count($partes) >= 2) {
            $iniciales .= strtoupper(substr($partes[0], 0, 1));
            $iniciales .= strtoupper(substr(end($partes), 0, 1));
        } elseif (! empty($partes[0])) {
            $iniciales = strtoupper(substr($partes[0], 0, 2));
        }

        return $iniciales;
    }
}
