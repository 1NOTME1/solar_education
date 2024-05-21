<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posty';

    public function komentarze()
    {
        return $this->hasMany(Komentarz::class, 'post_id');
    }

    public function watek()
    {
        return $this->belongsTo(Watek::class, 'watek_id');
    }

    public function uzytkownik()
    {
        return $this->belongsTo(Uzytkownik::class, 'uzytkownik_id');
    }
}
