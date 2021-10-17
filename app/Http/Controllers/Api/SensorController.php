<?php

namespace App\Http\Controllers\Api;

use App\Models\Device;
use App\Models\Sensor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SensorController extends Controller
{
    public function index() {
        //reads all sensors in the database
        $sensors = Sensor::with('device')->get();
        return response()->json($sensors);
    }


    public function show($id){
        //find a sensor by id if not it throws an expetion
        $sensor = Sensor::findOrFail($id);
        return response()->json($sensor);
    }

    public function store(Request $request) {

        $request->validate([
            'photo' => 'required',
        ]);
        
        $sensor = new Sensor([
            'photo' => $request->photo,
        ]);
        $id = $request->device_id;
        $device = Device::findOrFail($id);
        $device->sensor()->save($sensor);
        return response()->json($sensor);

    }

    public function update(Request $request ,$id) {
        $sensor = Sensor::findOrFail($id);
        
        $request->validate([
            'photo' => 'required',
        ]);

        $sensor->photo = $request->get('photo');
        $sensor->save();
        return response()->json($sensor);
    }

    public function destroy($id){
        $sensor = Sensor::findOrFail($id);
        $sensor->delete();
        return response()->json(Sensor::all());
    }
}
