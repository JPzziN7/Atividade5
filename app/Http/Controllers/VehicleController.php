<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function getAccesses($id){
        $vehicle = Vehicle::find($id);

        if(!$vehicle){
            return response()->json(['error' => 'Veículo não encontrado']);
        }
        return response()->json($vehicle->accesses);
    }
}
