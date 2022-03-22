@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar el Cliente:{{$cliente->name}} </h1>

    </section>
    <section class="content">

        <div class="box">

            <div class="box-header">

                <a href="{{url('clientes')}}">


                    <button class="btn btn-primary">Volver a Clientes</button>
                </a>




            </div>

            <div class="box-body">

                <form method="post"action="{{url('actualizar-cliente/'.$cliente->id)}}">

                    @csrf 
                    @method('put')


                <h4>Nombres y Apellidos</h4>

                   <input type="text" class="form-control input lg" name="name" value="{{$cliente->name}}">
                   <h4>Documento</h4>
                   <input type="text" class="form-control input lg" name="documento" value="{{$cliente->documento}}">
                   <h4>Email</h4>
                   <input type="text" class="form-control input lg" name="email" value="{{$cliente->email}}">
                   <h4>Actualizar Contraseña</h4>
                   <input type="text" class="form-control input lg" name="passwordN" value="">
                   <input type="hidden" class="form-control input lg" name="password" value="{{$cliente->password}}">
                   <h4>Telefono</h4>
                   <input type="text" class="form-control input lg" name="telefono" value="{{$cliente->telefono}}">
                   <h4>Dirección</h4>
                   <input type="text" class="form-control input lg" name="direccion" value="{{$cliente->direccion}}">

                <br><br>

                    <button class="btn btn-success " type="submit">Actualizar el Cliente</button>
                </form>

            </div>

        </div>

    </section>

</div>

@endsection