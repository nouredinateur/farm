<?php

namespace App\Models;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reference extends Model
{
    use HasFactory;


    protected $fillable = [
        'parent_id',
        'code',
        'label'
    ];

    public function sensor() 
    {
        return $this->hasMany(Sensor::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class, 'parent_id');
    }

    public function childReferences()
    {
        return $this->hasMany(Reference::class, 'parent_id')->with('references');
    }
   
}
