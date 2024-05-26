<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentarz extends Model
{
    use HasFactory;

    protected $table = 'komentarze';
    protected $fillable = ['tresc', 'data_publikacji', 'uzytkownik_id', 'post_id'];
    public $timestamps = false;

    public function uzytkownik()
    {
        return $this->belongsTo(User::class, 'uzytkownik_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
