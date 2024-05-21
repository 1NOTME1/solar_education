<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzytkownik extends Model
{
    use HasFactory;

    protected $table = 'uzytkownicy';

    public function rola()
    {
        return $this->belongsTo(Role::class, 'rola_id');
    }

    public function watki()
    {
        return $this->hasMany(Watek::class, 'uzytkownik_id');
    }

    public function posty()
    {
        return $this->hasMany(Post::class, 'uzytkownik_id');
    }

    public function komentarze()
    {
        return $this->hasMany(Komentarz::class, 'uzytkownik_id');
    }
}
