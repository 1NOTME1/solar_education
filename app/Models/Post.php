<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posty';
    protected $fillable = ['tresc', 'data_publikacji', 'uzytkownik_id', 'watek_id'];
    public $timestamps = false;

    public function uzytkownik()
    {
        return $this->belongsTo(User::class, 'uzytkownik_id');
    }

    public function watek()
    {
        return $this->belongsTo(Watek::class, 'watek_id');
    }

    public function komentarze()
    {
        return $this->hasMany(Komentarz::class, 'post_id');
    }
}
