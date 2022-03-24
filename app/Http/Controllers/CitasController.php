<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
      if(auth()->user()->rol== "tecnico" && $id!= auth()->user()->id){

          return redirect('Inicio');
      }

      $horarios = DB::select('select * from horarios where id_tecnico ='.$id);
      return view('modulos.Citas')->with('horarios', $horarios);
    }

    
    public function HorarioTecnico(Request $request)
    {
        $datos=request();
        DB::table('horarios')->insert(['id_tecnico'=>auth()->user()->id, 'horaInicio'=>$datos["horaInicio"], 'horaFin'=>$datos["horaFin"]]);

        return redirect('Citas/'.auth()->user()->id);
    }

    public function EditarHorario(Request $request)
    {
        $datos=request();
        DB::table('horarios')->where('id', $datos['id'])->update(['horaInicio'=>$datos["horaInicioE"], 'horaFin'=>$datos["horaFinE"]]);

        return redirect('Citas/'.auth()->user()->id);
    }


   
    public function show(Citas $citas)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citas $citas)
    {
        //
    }
}
