<?php

namespace App\Http\Controllers;

use App\Models\Tecnicos;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnicos  $tecnicos
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnicos $tecnicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tecnicos  $tecnicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnicos $tecnicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tecnicos  $tecnicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnicos $tecnicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tecnicos  $tecnicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnicos $tecnicos)
    {
        //
    }
}
// cometario prueba*