<?php

namespace App\Models;

use App\Models\Device;
use App\Models\Reference;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'reference_id',
        'type',
        'device_id'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
