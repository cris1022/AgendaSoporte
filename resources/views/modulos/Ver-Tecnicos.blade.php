@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tecnicos del Servicio de: <br>
            <b>{{$servicio->servicio}}</b></h1>

    </section>
    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-dordered table-striped table-hover">

                    <thead>

                        <tr>

                            <th>Nombre y Apellido</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Horario</th>
                            <th></th>


                        </tr>


                    </thead>

                    <tbody>

                    @foreach($horarios as $hora )

                        @foreach($tecnicos as $tecnico)

                            @if($hora->id_tecnico==$tecnico->id)

                                <tr>
                                    <td>{{$tecnico->name}}</td>
                                    <td>{{$tecnico->email}}</td>

                                    @if($tecnico->telefono!="")
                                        <td>{{$tecnico->telefono}}</td>
                                    @else
                                        <td>No disponible</td>
                                    
                                    @endif

                                    <td>{{$hora->horaInicio}}-{{$hora->horaFin}}</td>

                                        <td>                            

                                        
                                             <a href="{{url('Citas/'.$tecnico->id)}}">

                                                <button class="btn btn-primary">Agenda de Citas</button>
                                             </a> 

                                        </td>
                                
                                   


                            @endif    



                        


                               
                            </tr>



                        @endforeach

                    @endforeach    

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

@endsection