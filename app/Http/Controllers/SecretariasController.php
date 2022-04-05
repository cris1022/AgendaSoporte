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


    public function destroy($id)
    {
        Secretarias::destroy($id);
        return redirect('Secretarias');
    }

   
    public function show($id)

    {

        if(auth()->user()->rol != "administrador"){
            return redirect('Inicio');
        }
        $secretarias=Secretarias::all()->where('rol','secretaria');
        $secretaria=Secretarias::find($id);

        return view('modulos.Secretarias',compact('secretarias', 'secretaria'));
        
    }

   
    public function update(Request $request, Secretarias $id)
    {

        if($id['email']!=request('email')&& request('paswordN')!=""){

            $datos=request()->validate([

                'name'=>['required','string','max: 255'],
                'email'=>['required','string','email','max: 255','unique:users'],
                'passwordN'=>['required','string','min: 3']

            ]);

            DB::table('users')->where('id',$id["id"])->update(['name'=>$datos["name"],'email'=>$datos["email"],
            'password'=>Hash::make($datos["passwordN"])]);


        }elseif($id['email']!=request('email')&& request('paswordN')==""){

            $datos=request()->validate([

                'name'=>['required','string','max: 255'],
                'email'=>['required','string','email','max: 255','unique:users'],
                'password'=>['required','string','min: 3']

            ]);

            DB::table('users')->where('id',$id["id"])->update(['name'=>$datos["name"],'email'=>$datos["email"],
            'password'=>Hash::make($datos["password"])]);


        }elseif($id['email']==request('email')&& request('paswordN')!=""){


            $datos=request()->validate([

                'name'=>['required','string','max: 255'],
                'email'=>['required','string','email','max: 255',],
                'passwordN'=>['required','string','min: 3']

            ]);

            DB::table('users')->where('id',$id["id"])->update(['name'=>$datos["name"],'email'=>$datos["email"],
            'password'=>Hash::make($datos["passwordN"])]);




        }else{

            $datos=request()->validate([

                'name'=>['required','string','max: 255'],
                'email'=>['required','string','email','max: 255',],
                'passwordN'=>['required','string','min: 3']

            ]);

            DB::table('users')->where('id',$id["id"])->update(['name'=>$datos["name"],'email'=>$datos["email"],
            'password'=>Hash::make($datos["passwordN"])]);




        }


        return redirect('Secretarias');
            
    }
    /****/

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
   
}
