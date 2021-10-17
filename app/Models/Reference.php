<?php

namespace App\Models;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reference extends Model
{
    use HasFactory;


    protected $fillable = [
        'device_id',
        'code',
        'label'
    ];

    // public function sensor() 
    // {
    //     return $this->hasMany(Sensor::class);
    // }

    public function childRefs()
    {
        return $this->hasMany('Reference', 'ParentID', 'id_ref');
    }

    public function parentRefs()
    {
        return $this->childRefs()->with('parentRefs');
    }
   
}
