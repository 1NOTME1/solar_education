<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role; // Importuj model Role, jeśli znajduje się w innym namespace

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacja z tabelą roles
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // Dodaj odpowiednie pole klucza obcego jeśli jest inne niż 'role_id'
    }
}
