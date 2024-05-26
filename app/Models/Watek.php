<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watek extends Model
{
    use HasFactory;

    protected $table = 'watki';
    protected $fillable = ['tytul', 'uzytkownik_id', 'data_utworzenia', 'kategoria_forum_id'];
    public $timestamps = false;

    public function uzytkownik()
    {
        return $this->belongsTo(User::class, 'uzytkownik_id');
    }

    public function posty()
    {
        return $this->hasMany(Post::class, 'watek_id');
    }
}
