<aside class="main-sidebar">

<section class="sidebar">
    
    <ul class="sidebar-menu">

        <li>
            <a href="{{url('Inicio')}}">
                <i class="fa fa home"></i>
                <span>Inicio</span>
            </a>
        </li>
        <li>
            <a href="{{url('Citas/'.auth()->user()->id)}}">
                <i class="fa fa-handshake-o "></i>
                <span>Citas</span>
            </a>
        </li>
        
        <li>
            <a href="{{url('Clientes')}}">
                <i class=" fa fa-user-circle"></i>
                <span>Clientes</span>
            </a>
        </li>

    </ul>

</section>

</aside>