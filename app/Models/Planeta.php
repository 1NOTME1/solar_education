<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planeta extends Model
{
    use HasFactory;

    protected $table = 'planety';

    public function ksiezyce()
    {
        return $this->hasMany(Ksiezyc::class, 'planeta_id');
    }
}
