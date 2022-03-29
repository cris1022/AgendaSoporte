@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        
        <h3>Su Historial de Servicios Solicitados</h3>

    </section>
    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-cordered table-hover table-striped">

                    <thead>

                        <tr>
                            <th>Fecha y hora </th>
                            <th>Tecnico(a) </th>
                            <th>Servicio </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citas as $cita)

                            <tr>

                                <td>{{ $cita-> FyHinicio }}</td>

                                @foreach($tecnicos as $tecnico)

                                    @if($cita->id_tecnico==$tecnico->id)

                                        <td>{{$tecnico->name}}</td>

                                        @foreach($servicios as $servicio)

                                        @if($tecnico->id_servicio==$servicio->id)

                                            <td>{{$servicio->servicio}}</td>
                                        @endif

                                        @endforeach
                                    @endif

                                @endforeach
                               


                            </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

@endsection