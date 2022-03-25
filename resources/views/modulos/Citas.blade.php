@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">

        <h2>Horarios</h2>

        @if($horarios==null)

            <form action="" method="post">


                @csrf
                <div class="row">


                    <div class="col-md-2">

                        Desde <input type="time" class="form-control" name="horaInicio" >


                    </div>

                    <div class="col-md-2">

                        Hasta <input type="time" class="form-control" name="horaFin" >


                    </div>

                    <br>

                    <div class="col-md-1">

                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>


                </div>


            </form>
              

        @else

            @foreach($horarios as $hora)

            <form action="{{url('editar-horario/'.$hora->id)}}" method="post">


                @csrf
                @method('put')
                <div class="row">


                    <div class="col-md-2">

                        Desde <input type="time" class="form-control" name="horaInicioE" value="{{$hora->horaInicio}}" >


                    </div>

                    <div class="col-md-2">

                    Hasta <input type="time" class="form-control" name="horaFinE" value="{{$hora->horaFin}}">


                    </div>

                <br>

                    <div class="col-md-1">

                     <button type="submit" class="btn btn-success">Editar</button>

                    </div>


                </div>


            </form>

            @endforeach
        
             


        @endif

    </section>
    <section class="content">

        <div class="box">

            <div class="box-body">

                <div id="calendario"></div>

            </div>

        </div>

    </section>

</div>

<div class="modal fade" id="CitaModal">


        <div class="modal-dialog">

            <div class="modal-content">

                <form method="post" action="">

                    <div class="modal-body">

                        <div class="box-body">

                            <div class="form-group">

                                <h4>Seleccionar Cliente </h4>

                            </div>
                            <div class="form-group">

                                <h4>Fecha </h4>
                                <input type="text" class="form-control input-lg" id="Fecha" readonly="">

                            </div>
                            <div class="form-group">

                                <h4>Hora </h4>
                                <input type="text" class="form-control input-lg" id="Hora" readonly="">

                            </div>


                        </div>


                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Pedir Cita</button>
                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>


                    </div>


                </form>

            </div>


        </div>
</div>



@endsection