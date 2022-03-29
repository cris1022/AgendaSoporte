<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Clientes;
use App\Models\Tecnicos;
use App\Models\Servicios;
use App\Models\User;

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

      $clientes = Clientes::all();

      $citas = Citas::all()->where('id_tecnico',$id);

      $tecnico = Tecnicos::find($id);

      return view('modulos.Citas',compact('horarios', 'clientes', 'citas','tecnico'));
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


   
    public function CrearCita(Request $id_tecnico)
    
    {
        

        Citas::create(['id_tecnico'=>request('id_tecnico'), 'id_cliente'=>request('id_cliente'), 'FyHinicio'=>request('FyHinicio'), 'FyHfinal'=>request('FyHfinal')]);

        return redirect ('Citas/'.request('id_tecnico'));
       
    }

      
    public function destroy(Citas $citas)
    {

        DB::table('citas')->whereId(request('idCita'))->delete();

        return redirect('Citas/'.request('idTecnico'));
        
    }

    public function historial()
    {       
        if(auth()->user()->rol != "cliente"){


            return view('modulos.Inicio');
       
        }else{

            $citas= Citas::all()->where('id_cliente', auth()->user()->id);

            $tecnicos= User::all()->where('rol','tecnico');
            $servicios= Servicios::all();

            return view('modulos.Historial', compact('citas', 'tecnicos','servicios'));

        }
        
    }
}



