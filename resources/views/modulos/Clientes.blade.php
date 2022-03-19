@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Clientes</h1>

    </section>
    <section class="content">

        <div class="box">

            <div class="box-header">

               <a href="Crear-Cliente">

               <button class="btn btn-primary btn-lg">Agregar Cliente</button>
               </a>

            </div>

            <div class="box-body">

                <table class=" table table-bordered tabled-hover tabled-striped" >

                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>Nombres y Apellidos </th>
                            <th>Documento</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Editar / Borrar</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>11</td>
                            <td>Cliente</td>
                            <td>123456</td>
                            <td>11@gmail.com</td>
                            <td>11111111</td>
                            <td>tr14</td>
                            <td>

                                <button class="btn btn-success"> <i class="fa fa-pencil"> </i> </button>

                                <button class="btn btn-danger"> <i class="fa fa-trash"> </i> </button>

                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>

        </div>

    </section>

</div>

@endsection