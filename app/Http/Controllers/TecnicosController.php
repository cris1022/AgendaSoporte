<?php

namespace App\Http\Controllers;

use App\Models\Tecnicos;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TecnicosController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(auth()->user()->rol != "administrador"&& auth()->user()->rol != "secretaria"){
            return redirect('Inicio');
        }

        $servicios= Servicios::all();
        $tecnicos= Tecnicos::all();

        return view('modulos.Tecnicos',compact('servicios','tecnicos'));
    }
    
    
    public function store(Request $request)
    {
      $datos=request()->validate([
          'name'=>['required'],
          'id_servicio'=>['required'],
          'password'=>['required', 'string', 'min:3'],
          'email'=>['required', 'string', 'email','unique:users']
      ]);

      Tecnicos::create([
        'name'=>$datos['name'],
        'email'=>$datos['email'],
        'password'=>Hash::make($datos['password']),
        'documento'=>'',
        'telefono'=>'',
        'direccion'=>'',
        'tarjeta_profesional'=>'',
        'id_servicio'=>$datos['id_servicio'],
           
        'rol'=>'tecnico',
    
        
        


       
    ]);
        return redirect('Tecnicos')->with('registrado', 'Si');

    }


    public function destroy($id)
    {
       DB::table('users')->whereId($id)->delete();
       return redirect('Tecnicos');
    }

    public function VerTecnicos($id)
    {
        $servicio = Servicios::find($id);

        $tecnicos= DB::select('select *from users where id_servicio = '.$id);

        $horarios= DB::select('select *from horarios');

        return view("modulos.Ver-Tecnicos", compact('servicio','tecnicos','horarios'));
    }
}
// cometario prueba*