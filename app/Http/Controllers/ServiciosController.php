<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
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
        $servicios=Servicios::all();


        return view('modulos.Servicios')->with('servicios', $servicios);
    }

    public function store(Request $request)
    {
        Servicios::create(['servicio'=> request('servicio')]);

        return redirect('Servicios');
    }

  
  
    public function update(Request $request)
    {
      
       DB::table('servicios')->where('id', request('id'))->update(['servicio'=> request('serviciosE')]);
       return redirect('Servicios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicios  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('servicios')->whereId($id)->delete();
       return redirect('Servicios');
    }
}
