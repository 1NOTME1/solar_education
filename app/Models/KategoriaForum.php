<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriaForum extends Model
{
    use HasFactory;

    protected $table = 'kategorie_forum';
    protected $fillable = ['nazwa'];
    public $timestamps = false;

    public function watki()
    {
        return $this->hasMany(Watek::class, 'kategoria_forum_id');
    }
}
