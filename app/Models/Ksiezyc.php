<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ksiezyc extends Model
{
    use HasFactory;

    protected $table = 'ksiezyce';
    protected $fillable = ['nazwa', 'typ', 'masa', 'odleglosc_od_planety', 'opis', 'status', 'planeta_id'];
    public $timestamps = false;

    public function planeta()
    {
        return $this->belongsTo(Planeta::class);
    }
}
