@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Crear Cliente</h1>

    </section>
    <section class="content">

        <div class="box">

            <div class="box-body">


                <form method="post"action="">

                 @csrf 

                    <div class="form-group">

                        <h4>Nombres y Apellidos:</h4>
                        <input type="text" name="name" class="form-control input-lg">


                    </div>
                     
                    <div class="form-group">

                        <h4>Documento:</h4>
                        <input type="text" name="documento" class="form-control input-lg">
                    </div>
                    <div class="form-group">

                        <h4>Email:</h4>
                        <input type="email" class="form-control input-lg" name="email" value="">
                                @error('email')
                                <div class="alert alert-danger">El email ya existe</div>
                                @enderror
                    </div>
                    <div class="form-group">

                        <h4>Telefono:</h4>
                        <input type="text" name="telefono" class="form-control input-lg">
                    </div>
                      <div class="form-group">

                        <h4>Direccion:</h4>
                        <input type="text" name="direccion" class="form-control input-lg">
                    </div>

                      <div class="form-group">

                        <h4>Contraseña:</h4>
                        <input type="text" name="password" class="form-control input-lg">
                    </div>

                    <br>
                    <button type="submit"class="btn btn-primary btn-lg">Agregar</button>



                 </form>

            </div>

        </div>

    </section>

</div>

@endsection