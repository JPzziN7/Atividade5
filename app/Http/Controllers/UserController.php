<?php

namespace App\Http\Controllers;

use App\Models\Access;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create(){
        $user = new User();
        $user->name = 'Lucas';
        $user->email = 'lucas.garofolo@sp.senai.br';
        $user->password = Hash::make('123456');
        $user->save();

        $user = new User();
        $user->name = 'Ramon';
        $user->email = 'ramon.moraes@sp.senai.br';
        $user->password = Hash::make('123456');
        $user->save();

        $user = new User();
        $user->name = 'Felipe';
        $user->email = 'felipe.diniz@sp.senai.br';
        $user->password = Hash::make('123456');
        $user->save();

        echo 'DADOS SALVOS';
        return;
    }

        public function get(){
            $users = new User();
            $users = $users->get();
    
            return response()->json($users);
        }
    
        public function getById($id){
            $user = new User();
            $user = $user->where('id', $id)->first();
    
            return response()->json($user);
        }

    public function createVehicles(){
        $user = User::find(1);

        $user = new User();
        $user = $user->where('id', 1)->first();

        $vehicle = new Vehicle();
        $vehicle->brand = 'Volkswagen';
        $vehicle->model = 'Fox';
        $vehicle->color = 'Café com Leite';
        $vehicle->plate = 'FOX-1V23';
        $vehicle->user()->associate($user);
        $vehicle->save();

        $access = new Access();
        $access->date_time = date('2024-05-17 07:07:34');
        $access->type = 'IN';
        $access->vehicle()->associate($vehicle);
        $access->save();
        $access = new Access();
        $access->date_time = date('2024-05-17 16:31:23');
        $access->type = 'OUT';
        $access->vehicle()->associate($vehicle);
        $access->save();

        $user = User::find(2);

        $vehicle = new Vehicle();
        $vehicle->brand = 'Mini';
        $vehicle->model = 'Cooper S';
        $vehicle->color = 'Preto';
        $vehicle->plate = 'MIN-1C00';
        $vehicle->user()->associate($user);
        $vehicle->save();

        $access = new Access();
        $access->date_time = date('2024-05-16 07:11:23');
        $access->type = 'IN';
        $access->vehicle()->associate($vehicle);
        $access->save();
        $access = new Access();
        $access->date_time = date('2024-05-17 16:21:47');
        $access->type = 'OUT';
        $access->vehicle()->associate($vehicle);
        $access->save();

        $user = User::find(3);

        $vehicle = new Vehicle();
        $vehicle->brand = 'Fiat';
        $vehicle->model = 'Pulse';
        $vehicle->color = 'Cinza';
        $vehicle->plate = 'FIA-1P89';
        $vehicle->user()->associate($user);
        $vehicle->save();

        $access = new Access();
        $access->date_time = date('2023-10-12 07:00:21');
        $access->type = 'IN';
        $access->vehicle()->associate($vehicle);
        $access->save();
        $access = new Access();
        $access->date_time = date('2024-05-17 16:46:11');
        $access->type = 'OUT';
        $access->vehicle()->associate($vehicle);
        $access->save();

        echo 'DADOS SALVOS';
        return;
    }

    public function getVehicles($id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['error' => 'Usuário não encontrado']);
        }
        return response()->json($user->vehicles);
    }

        public function getAccess($id){
            $user = User::find($id);

            if(!$user){
                return response()->json(['error' => 'Usuário não encontrado']);
            }
            $vehicle = $user->vehicles;
            $accesse = [];
            foreach($user->vehicles as $vehicle){
                $accesse[] = $vehicle->accesses;
            }
            return response()->json($accesse);
        }
    
}
