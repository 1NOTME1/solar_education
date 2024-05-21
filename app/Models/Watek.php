<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watek extends Model
{
    use HasFactory;

    protected $table = 'watki';

    public function posty()
    {
        return $this->hasMany(Post::class, 'watek_id');
    }

    public function kategoria()
    {
        return $this->belongsTo(KategorieForum::class, 'kategoria_forum_id');
    }

    public function uzytkownik()
    {
        return $this->belongsTo(Uzytkownik::class, 'uzytkownik_id');
    }
}
