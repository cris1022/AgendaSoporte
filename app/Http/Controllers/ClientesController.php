<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(auth()->user()->rol != "administrador"&& auth()->user()->rol != "secretaria"&& auth()->
            user()->rol != "tecnico"){
           
            return redirect('Inicio');

            }
            
        return view ('modulos.Clientes');
    }


 
    public function create()
    {
        if(auth()->user()->rol != "administrador"&& auth()->user()->rol != "secretaria"&& auth()->
        user()->rol != "tecnico"){
       
        return redirect('Inicio');

        }
        
    return view ('modulos.Crear-Cliente');
    }

  
    public function store(Request $request)
    {
        $datos=request()->validate([
            'name'=>['required'],
            'documento'=>['required'],
            'telefono'=>['required'],
            'direccion'=>['required'],
            'password'=>['required', 'string', 'min:3'],
            'email'=>['required', 'string', 'email','unique:users']
        ]);
  
        Clientes::create([
          'name'=>$datos['name'],
          'email'=>$datos['email'],
          'password'=>Hash::make($datos['password']),
          'documento'=>$datos['documento'],
          'telefono'=>$datos['telefono'],
          'direccion'=>$datos['direccion'],
          'tarjeta_profesional'=>'',
          'id_servicio'=>0,
             
          'rol'=>'cliente',
      
          
          
  
  
         
      ]);
          return redirect('Clientes')->with('agregado', 'Si');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
