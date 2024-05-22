<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planeta extends Model
{
    use HasFactory;

    protected $table = 'planety';
    protected $fillable = ['nazwa', 'typ', 'masa', 'odleglosc_od_slonca', 'opis', 'status'];
    public $timestamps = false; // Dodano linijkę wyłączającą automatyczne timestamps

    public function ksiezyce()
    {
        return $this->hasMany(Ksiezyc::class, 'planeta_id');
    }
}
