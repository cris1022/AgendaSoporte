@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Secretarias</h1>

    </section>
    <section class="content">

        <div class="box">

            <div class="box-header">

                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearSecretaria">Crear Secretaria</button>

            </div>

            <div class="box-body">

                <table class="table table-hover table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>ID</th>   
                            <th>Nombre </th>   
                            <th>Email</th>   
                            <th>Documento</th>   
                            <th>Telefono</th>   

                            <th>Editar / Borrar</th>   

                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($secretarias as $secretaria)

                            <tr>
                                <td>{{$secretaria->id}}</td>
                                <td>{{$secretaria->name}}</td>

                                <td>{{$secretaria->email}}</td>

                                @if($secretaria->documento !="")

                                <td>{{$secretaria->documento}}</td>

                                @else

                                <td>No Disponible</td>

                                @endif

                                @if($secretaria->telefono !="")

                                <td>{{$secretaria->telefono}}</td>

                                @else

                                <td>Aun no registrado</td>

                                @endif

                                <td>
                                    <button class="btn btn-success"> <i class=" fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"> <i class=" fa fa-trash"></i></button>
                                    
                                </td>

                            </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>
<div class="modal fade" id="CrearSecretaria">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post">
                @csrf 

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">

                            <h4>Nombre y Apellido </h4>
                            <input type="text " class="form-control input-lg" name="name" vale="{{old('name')}}">
                            @error('name')

                                <div class="alert alert-danger">

                                    El nombre ya existe....

                                </div>

                            @enderror


                        </div>
                        <div class="form-group">

                            <h4>Email </h4>
                            <input type="text " class="form-control input-lg" name="email" required value="{{old('email')}}">
                            @error('email')

                                <div class="alert alert-danger">

                                    El email ya existe....

                                </div>

                            @enderror

                        </div>
                        <div class="form-group">

                            <h4>Contraseña </h4>
                            <input type="text " class="form-control input-lg" name="password" vale="{{old('password')}}">

                        </div>



                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-primary" type="submit">Crear</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                    

                </div>

            </form>

        </div>

    </div>

</div>

@endsection