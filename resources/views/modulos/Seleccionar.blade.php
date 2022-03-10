@extends('plantilla')
@section('contenido')

<section class="content">
    <center>
        <h1>Seleccione como desea Ingresar al Sistema </h1>
    </center>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #F781D8; color:white;">
                 <div class="inner">
                    <h3>secretaria</h3>
                    <p>Incie sesion</p>

                 </div>
                    <div class="icon">
                        <i class="fa fa-female"></i>

                    </div>
                    <a href="Ingresar" class="small-box-footer">
                       Ingresar <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #BDBDBD; color:white;">
                 <div class="inner">
                    <h3>Tecnico</h3>
                    <p>Incie sesion</p>

                 </div>
                    <div class="icon">
                        <i class="	fa fa-wrench"></i>

                    </div>
                    <a href="Ingresar" class="small-box-footer">
                       Ingresar <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #ffbb2f; color:white;">
                 <div class="inner">
                    <h3>Cliente</h3>
                    <p>Incie sesion</p>

                 </div>
                    <div class="icon">
                        <i class="fa fa-group"></i>

                    </div>
                    <a href="Ingresar" class="small-box-footer">
                       Ingresar <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: #ff6e51; color:white;">
                 <div class="inner">
                    <h3>Administrador</h3>
                    <p>Incie sesion</p>

                 </div>
                    <div class="icon">
                        <i class="fa fa-gears"></i>

                    </div>
                    <a href="Ingresar" class="small-box-footer">
                       Ingresar <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>

    </div>

    


</section>
@endsection