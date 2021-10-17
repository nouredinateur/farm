<?php

namespace App\Models;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'brand',
        'memory',
        'ram',
        'isActivated'
    ];

    public function sensor()
    {
        return $this->hasMany(Sensor::class);
    }

 
}
