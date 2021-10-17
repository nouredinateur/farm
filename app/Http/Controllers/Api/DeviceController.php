<?php

namespace App\Http\Controllers\Api;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeviceController extends Controller
{
    public function index() {
        //reads all devices in the database
        $devices = Device::with('sensor')->get();
        return response()->json($devices);
    }


    public function show($id){
        //find a device by id if not it throws an expetion
        $device = Device::findOrFail($id);
        return response()->json($device);
    }

    public function store(Request $request) {

        $request->validate([
            'photo' => 'required',
            'brand' => 'required',
            'memory' => 'required',
            'ram' => 'required',
            'isActivated' => 'required',
        ]);

        $device = new Device([
            'photo' => $request->photo,
            'brand' => $request->brand,
            'memory' => $request->memory,
            'ram' => $request->ram,
            'isActivated' => $request->isActivated
        ]);

        $device->save();

        return response()->json($device);

    }

    public function update(Request $request ,$id) {
        $device = Device::findOrFail($id);
        
        $request->validate([
            'photo' => 'required',
            'brand' => 'required',
            'memory' => 'required',
            'ram' => 'required',
            'isActivated' => 'required',
        ]);

        $device->photo = $request->get('photo');
        $device->brand = $request->get('brand');
        $device->memory = $request->get('memory');
        $device->ram = $request->get('ram');
        $device->isActivated = $request->get('isActivated');
        $device->save();
        return response()->json($device);
    }

    public function destroy($id){
        $device = Device::findOrFail($id);
        $device->delete();
        return response()->json(Device::all());
    }
}
