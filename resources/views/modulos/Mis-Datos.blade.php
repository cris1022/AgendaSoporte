@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Mis Datos Personales</h1>

    </section>
    <section class="content">

        <div class="box">

            <div class="box-body">

                <form method="post">

                    @csrf
                    @method('put')

                    <div class="row">

                        <div class="col-md-6 col-xs-12">

                                 <h3>Nombres y Apellidos</h3>

                                 <input class=" imputt-lg" type="text" name="name" value="{{auth()->user()->name}}">

                                <h3>Email</h3>

                                <input class=" imputt-lg" type="email" name="email" value="{{auth()->user()->email}}">
                                @error('email')

                                    <p class="alert alert-danger">El email ya Existe</p>
                                @enderror

                                <h3>Nueva Contraseña</h3>

                                <input class=" imputt-lg" type="text" name="passwordN" value="">    


                        </div>
                        <div class="col-md-6 col-xs-12">

                            <h3>Documento</h3>

                            <input class=" imputt-lg" type="text" name="documento" value="{{auth()->user()->documento}}">

                            <h3>Telefono</h3>

                            <input class=" imputt-lg" type="text" name="telefono" value="{{auth()->user()->telefono}}">

                            <h3>Direccion </h3>

                            <input class=" imputt-lg" type="text" name="direccion" value="{{auth()->user()->direccion}}">

                            <br><br><br>
                            
                            <button type="submit" class="btn btn-success">Actualizar</button>

                        </div>


                    </div>


                </form>

            </div>

        </div>

    </section>

</div>

@endsection