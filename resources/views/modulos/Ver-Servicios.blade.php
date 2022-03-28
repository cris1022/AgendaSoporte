@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Elija un Servicio:</h1>

    </section>
    <section class="content">

        <div class="box">

            <div class="box-body">

                @foreach($servicios as $servicio)

                <div class="col-lg-3 col-xs-6">

                    <a href="Ver-Tecnicos/{{$servicio->id}}">

                         <div class="small-box bg-aqua">

                             <div class="inner">

                                <h4>{{$servicio->servicio}}</h4>


                             </div>
                        </div>
                    </a>

                </div>

                @endforeach

                

            </div>

        </div>

    </section>

</div>

@endsection