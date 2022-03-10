<?php

namespace App\Http\Controllers;

use App\Models\Tecnicos;
use App\Models\Servicios;
use Illuminate\Http\Request;

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

        return view('modulos.Tecnicos')->with('servicios',$servicios);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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