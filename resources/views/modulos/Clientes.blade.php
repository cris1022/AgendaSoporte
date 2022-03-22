@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Clientes</h1>

    </section>
    <section class="content">

        <div class="box">

            <div class="box-header">

               <a href="Crear-Cliente">

               <button class="btn btn-primary btn-lg">Agregar Cliente</button>
               </a>

            </div>

            <div class="box-body">

                <table class=" table table-bordered tabled-hover tabled-striped" >

                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>Nombres y Apellidos </th>
                            <th>Documento</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Editar / Borrar</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($clientes as $cliente)


                        <tr>

                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->name}}</td>
                            <td>{{$cliente->documento}}</td>
                            <td>{{$cliente->email}}</td>

                            @if($cliente->telefono !="")
                                <td>{{$cliente->telefono}}</td>
                            @else
                            
                                <td>No disponible</td>
                            @endif
                            <td>{{$cliente->direccion}}</td>    
                            <td>

                                <a href="Editar-Cliente/{{ $cliente->id }}"><button class="btn btn-success"> <i class="fa fa-pencil"> </i> </button></a>

                                <button class="btn btn-danger"> <i class="fa fa-trash"> </i> </button>

                            </td>
                        </tr>
                    </tbody>
                        @endforeach

                        
                </table>


            </div>

        </div>

    </section>

</div>

@endsection