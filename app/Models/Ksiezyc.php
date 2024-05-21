<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ksiezyc extends Model
{
    use HasFactory;

    protected $table = 'ksiezyce';

    public function planeta()
    {
        return $this->belongsTo(Planeta::class, 'planeta_id');
    }
}
