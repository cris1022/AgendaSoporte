@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Tecnicos</h1>

    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">

                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearTecnico">Crear Tecnico</button>

            </div>
            
            <div class="box-body">

                <table class="table table-bordered table-hover table-striped dt-responsive">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Nombre y Apellido</th>
                            <th>Servicio</th>
                            <th>Email</th>
                            <th>Documento</th>
                            <th>Telefono</th>
                            <th>Tarjeta Profesional</th>

                            <th></th>    

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tecnicos as $tecnico)

                        @if($tecnico->rol=="tecnico")
                        <tr>
                            <td>{{ $tecnico->id}}</td>
                            <td>{{ $tecnico->name}}</td>
                            <td>{{ $tecnico->SER->servicios}}</td>
                            <td>{{ $tecnico->email}}</td>
                            @if($tecnico->documento !="")
                                 <td>{{ $tecnico->documento}}</td>

                            @else
                                 <td> Aún no registrado</td>  
                            @endif
                            @if($tecnico->telefono!="")
                                 <td>{{ $tecnico->telefono}}</td>

                            @else
                                <td> no disponible</td>  
                            @endif
                            @if($tecnico->tarjeta_profesional !="")
                                 <td>{{ $tecnico->tarjeta_profesional}}</td>

                            @else
                                 <td> Aún no registrado</td>  
                            @endif
                         

                            <td>

                               <button class="btn btn-danger EliminarTecnico" Did="{{$tecnico->id}}">

                                    <i class="fa fa-trash">

                                    </i>

                               </button>

                            </td>
                        </tr>
                        @endif

                        @endforeach
                        
                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<div id="CrearTecnico" class="modal fade">

    <div class="modal-dialog">

        <div>
            <div class="modal-content">

                <form method="post">

                        @csrf

                    <div class="modal-body">

                        <div class="box-body">

                            <div class="form-group">

                                <h2>Nombre y Apellido</h2>

                                <input type="text" class="form-control input-lg" name="name" required>

                            </div>
                            <div class="form-group">

                                <h2>Servicio</h2>

                               <select class="form-control input-lg" name="id_servicio" required="">

                                    <option value="">Seleccionar...</option>
                                    @foreach($servicios as $servicio)                                  )


                                         <option value="{{$servicio->id}}">{{$servicio->servicio}}</option>

                                    @endforeach

                               </select>

                            </div>
                            <div class="form-group">

                                <h2>Email</h2>

                                <input type="email" class="form-control input-lg" name="email" value="">
                                @error('email')
                                <div class="alert alert-danger">El email ya existe</div>
                                @enderror

                            </div>

                            <div class="form-group">

                                <h2>Contraseña</h2>

                                <input type="text" class="form-control input-lg" name="password" required>

                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Crear</button>
                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    </div>
                </form>

            </div>
        </div>

    </div>

</div>

@endsection