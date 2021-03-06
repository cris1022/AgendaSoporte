@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">


        <h3>Tecnico(a):{{$tecnico->name}}</h3>



        <h2>Horarios</h2>

        @if($horarios==null)

            @if(auth()->user()->rol== "tecnico")

                <form action="{{url('Horario')}}" method="post">


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
            @endif    

              

        @else

            @foreach($horarios as $hora)
                @if(auth()->user()->rol== "tecnico") 

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
                    @elseif(auth()->user()->rol== "cliente")

                        <h3>{{$hora->horaInicio}}  -  {{$hora->horaFin}}</h3>
                @endif       

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
                    @csrf

                    <div class="modal-body">

                        <div class="box-body">

                            <div class="form-group">

                                <h4>Seleccionar Cliente </h4>

                                <input type="hidden" name="id_tecnico" value="{{auth()->user()->id}}">


                                <select required="" name="id_cliente" id="select2" style="width:100%">

                                    <option value="">Cliente....</option>

                                    @foreach($clientes as $cliente)

                                        @if($cliente->rol=="cliente")

                                        <option value="{{$cliente->id}}">{{$cliente->name}}-{{$cliente->documento}}</option>

                                        @endif
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">

                                <h4>Fecha </h4>
                                <input type="text" class="form-control input-lg" id="Fecha" readonly="">

                            </div>
                            <div class="form-group">

                                <h4>Hora </h4>
                                <input type="text" class="form-control input-lg" id="Hora" readonly="">

                                <input type="hidden" name="FyHinicio"class="form-control input-lg" id="FyHinicio" readonly="">

                                <input type="hidden" name="FyHfinal"class="form-control input-lg" id="FyHfinal" readonly="">

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

<div class="modal fade " id="EventoModal">

    <div class="modal-dialog"> 

        <div class="modal-content">

            <form method="post"action="{{url('borrar-cita')}}">

                @csrf 
                @method('delete')


                <div class="modal-body">

                    <div class="form-group">

                        <h4>Cliente</h4>

                        <h5 id="cliente"></h5>

                        <input type="hidden" name="idCita" id="idCita">


                        
                        <?php

                            $exp = explode("/", $_SERVER["REQUEST_URI"]);

                            echo '<input type="hidden" name="idTecnico" value="'.$exp[4].'">';

                        ?>

                        

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-warning">Cancelar Citas</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>

                </div>


            </form>

        </div>


    </div>


</div>

<div class="modal fade" id="Cita">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

             @csrf

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">

                            <?php

                                $exp = explode("/", $_SERVER["REQUEST_URI"]);

                                echo '<input type="hidden" name="id_tecnico" value="'.$exp[4].'">';

                            ?>
                            <input type="hidden" name="id_cliente" value="{{auth()->user()->id}}">                

                        

                        </div>
                        <div class="form-group">

                            <h4>Fecha:</h4>

                            <input type="text" class="form-control input-lg" id="FechaC" readonly="" >

                        </div>
                        <div class="form-group">

                            <h4>Hora:</h4>

                            <input type="text" class="form-control input-lg" id="HoraC" readonly="" >

                        </div>
                        <div class="form-group">

                         

                            <input type="hidden" class="form-control input-lg" id="FyHinicioC" name="FyHinicio" readonly="" >

                            <input type="hidden" class="form-control input-lg" id="FyHfinalC" name="FyHfinal" readonly="" >


                        </div>


                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-primary" type="submit">Pedir Cita</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

                </div>
            </form>

        </div>

    </div>

</div>



@endsection