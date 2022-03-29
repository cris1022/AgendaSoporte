<?php

namespace App\Http\Controllers;

use App\Models\Secretarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class SecretariasController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }    
    public function index()
    {
        if(auth()->user()->rol != "administrador"){
            return redirect('Inicio');
        }
        $secretarias=Secretarias::all()->where('rol','secretaria');

        return view('modulos.Secretarias')->with('secretarias', $secretarias);

    }
    
    
    public function store(Request $request)
    {
        $datos=request()->validate([

            'name'=>['required', 'string','max:255'],
            'email'=>['required', 'string','max:255','email', 'unique:users'],
            'password'=>['required', 'string','min:3'],
        ]);

        $secretarias=Secretarias::create([
            'name'=>$datos["name"],
            'id_servicio'=>0,
            'email'=>$datos["email"],
            'password'=>Hash::make($datos["password"]),
            'direccion'=>'',
            'telefono'=>'',
            'tarjeta_profesional'=>'',
            'documento'=>'',
            'rol'=>'secretaria'
            



        ]);
        return redirect('Secretarias')->with('SecretariaCreada', 'Si');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
    public function show(Secretarias $secretarias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
    public function edit(Secretarias $secretarias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Secretarias $secretarias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secretarias $secretarias)
    {
        //
    }
}
