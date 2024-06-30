<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';

    protected $fillable = [
        'nazwa',
    ];

    public function uzytkownicy()
    {
        return $this->hasMany(User::class, 'rola_id');
    }
}
