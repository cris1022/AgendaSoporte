@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">

        <h2>Horarios</h2>

        @if($horarios==null)

            <form action="" method="post">

                <div class="row">


                    <div class="col-md-2">

                        Desde <input type="text" class="form-control" name="horaInicio" >


                    </div>

                    <div class="col-md-2">

                        Hasta <input type="text" class="form-control" name="horaFin" >


                    </div>

                    <br>

                    <div class="col-md-1">

                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>


                </div>


            </form>

        @endif

    </section>
    <section class="content">

        <div class="box">

        </div>

    </section>

</div>

@endsection