<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zjawisko extends Model
{
    use HasFactory;

    protected $table = 'zjawiska';
    protected $fillable = ['nazwa', 'opis', 'data_zjawiska', 'kategoria_id', 'status'];
    public $timestamps = false;

    public function kategoria()
    {
        return $this->belongsTo(KategorieZjawisk::class, 'kategoria_id');
    }
}
