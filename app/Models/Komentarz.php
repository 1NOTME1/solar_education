<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentarz extends Model
{
    use HasFactory;

    protected $table = 'komentarze';

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function uzytkownik()
    {
        return $this->belongsTo(Uzytkownik::class, 'uzytkownik_id');
    }
}
