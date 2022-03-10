@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Servicios</h1>

    </section>
    <section class="content">

        <div class="box">
            <br>

            <form method="post">

                @csrf

                <div class="col-md-6 col-xs-12">

                     <input type="text" class="form-control" name="servicio" placeholder="Ingrese un nuevo servicio" 
                     required="">

                </div>
                
                <button class="btn btn-primary" type="submit">Agregar Servicio</button>
            </form>

            <br>

                <div class="box-body">

                        @foreach($servicios as $servicio)
                    
                            <div class="row">

                                <form method="post"action="{{url('Servicio/'.$servicio->id)}}">

                                    @csrf
                                    @method('put')
                
                                    <div class="col-md-4">

                                        <input type="text" class="form-control" name="serviciosE" value="{{ $servicio->servicio }}">

                                    </div>

                                    <div class="col-md-1">

                                        <button class="btn btn-success" type="submit"> Guardar</button>

                                    </div>               
                   

                                </form>

                                <div class="col-md-1">

                                    <form method="post"action="{{url('borrar-Servicio/'.$servicio->id)}}">
                                        @csrf
                                        @method('delete')

                                         <button type="submit" class="btn btn-danger">Borrar</button>

                                    </form>

                                </div>
                    

                </div>

            @endforeach

               
                

            </div>

    </section>

</div>

@endsection