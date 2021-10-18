<?php

namespace App\Http\Controllers\Api;

use App\Models\Device;
use App\Models\Sensor;
use App\Models\Reference;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReferenceController extends Controller
{

    public function getReferences()
    {
        $devices = Device::all();
        // $sensors = Sensor::all();
        $reference = new Reference([
            'code' => 'brand'
        ]);
        foreach($devices as $device){
            $brand = $device->brand;

            $reference = new Reference([
                'code' => Str::upper(Str::substr($brand, 0,3)),
                'label' => $device->brand 
            ]);
            if($loop->last){
               
            }
            $reference->save();
        }

        $references = Reference::whereNull('parent_id')
            ->with('childReferences')
            ->orderby('code', 'asc')
            ->get();
        return response()->json($references);
    }

   
}
