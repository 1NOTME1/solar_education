<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategorieZjawisk extends Model
{
    use HasFactory;

    protected $table = 'kategorie_zjawisk';

    protected $fillable = [
        'nazwa',
    ];

    public function zjawiska()
    {
        return $this->hasMany(Zjawisko::class, 'kategoria_id');
    }
}
