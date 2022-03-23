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
            $clientes=DB::select('select*from users where rol="cliente"');
            
        return view ('modulos.Clientes')->with ('clientes',$clientes);
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

   
    public function edit(Clientes $id)
    {
        if(auth()->user()->rol != "administrador"&& auth()->user()->rol != "secretaria"&& auth()->
        user()->rol != "tecnico"){
       
        return redirect('Inicio');

        }

        $cliente=Clientes::find($id->id);

        return view('modulos.Editar-Cliente')->with('cliente', $cliente);
    }

   
    public function update(Request $request, Clientes $cliente)
    {
        if($cliente["email"]!=request('email')&& request('passwordN')!=""){
            $datos=request()->validate([

                'name'=>['required'],
                'documento'=>['required'],
                'telefono'=>['required'],
                'direccion'=>['required'],
                'passwordN'=>['required', 'string', 'min:3'],
                'email'=>['required', 'string', 'email','unique:users']

            ]);
            DB::table('users')->where('id', $cliente["id"])->update(['name' => $datos["name"],'email'
            =>$datos["email"],'documento'=>$datos["documento"],'telefono'=>$datos["telefono"],'direccion'=>$datos["direccion"],'password'=>Hash::make($datos["passwordN"])]);
        }else if($cliente["email"]!=request('email')&& request('passwordN')==""){

            $datos=request()->validate([

                'name'=>['required'],
                'documento'=>['required'],
                'telefono'=>['required'],
                'direccion'=>['required'],
                'password'=>['required', 'string', 'min:3'],
                'email'=>['required', 'string', 'email','unique:users']

            ]);
            DB::table('users')->where('id', $cliente["id"])->update(['name' => $datos["name"],'email'
            =>$datos["email"],'documento'=>$datos["documento"],'telefono'=>$datos["telefono"],'direccion'=>$datos["direccion"],'password'=>Hash::make($datos["password"])]);

        }else if($cliente["email"]==request('email')&& request('passwordN')!=""){

            $datos=request()->validate([

                'name'=>['required'],
                'documento'=>['required'],
                'telefono'=>['required'],
                'direccion'=>['required'],
                'passwordN'=>['required', 'string', 'min:3'],
                'email'=>['required', 'string', 'email']

            ]);
            DB::table('users')->where('id', $cliente["id"])->update(['name' => $datos["name"],'email'
            =>$datos["email"],'documento'=>$datos["documento"],'telefono'=>$datos["telefono"],'direccion'=>$datos["direccion"],'password'=>Hash::make($datos["passwordN"])]);

        }else{
            $datos=request()->validate([

                'name'=>['required'],
                'documento'=>['required'],
                'telefono'=>['required'],
                'direccion'=>['required'],
                'password'=>['required', 'string', 'min:3'],
                'email'=>['required', 'string', 'email']

            ]);
            DB::table('users')->where('id', $cliente["id"])->update(['name' => $datos["name"],'email'
            =>$datos["email"],'documento'=>$datos["documento"],'telefono'=>$datos["telefono"],'direccion'=>$datos["direccion"],'password'=>Hash::make($datos["password"])]);
        }
        return redirect('Clientes')->with('actualizadoP', 'Si');
    }

    
    public function destroy( $id)
    {
       Clientes:: destroy($id);

       
       return redirect('Clientes');

     
    }

  
}
