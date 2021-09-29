 <!-- Navigation -->
<h6 class="navbar-heading text-muted">Menu</h6>
    <ul class="navbar-nav">
        {{-- ADMINISTRADOR TOTAL --}}
        @if(auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="/client">
                <i class="fas fa-users-cog"></i>Administradores
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/acertijo">
                <i class="ni ni-air-baloon"></i>Ax Equilicuá
            </a>
        </li>
        <div class="nav-item">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink2">
                    <i class="fa fa-gavel" aria-hidden="true" ></i>  Ax Thor 
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="/ticket">
                            <i class="fas fa-ticket-alt"></i> Tickets
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/cash">
                            <i class="far fa-money-bill-alt"></i> Efectivo
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <li class="nav-item">
            <a class="nav-link" href="/race">
                <i class="fas fa-flag-checkered"></i> Carreras
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/publicidad">
                <i class="fab fa-adversal"></i> Publicidad
            </a>
        </li>
         <div class="nav-item">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink2">
                    <i class="fa fa-gavel" aria-hidden="true" ></i>  Usuarios
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="/users">
                            <i class="fas fa-ticket-alt"></i> Usuarios Web
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/userwinner">
                            <i class="far fa-money-bill-alt"></i>Ganadores
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/winner">
                            <i class="far fa-money-bill-alt"></i>Ganadores / Carrera
                        </a>
                    </li>
                     
                </ul>
            </div>
        </div>
        <li class="nav-item">
            <a class="nav-link" href="/codes">
                <i class="fas fa-ticket-alt"></i> Códigos Promoción
            </a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="/atencion">
                <i class="fab fa-adversal"></i> Atención Al Cliente
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/reclamo">
                <i class="far fa-handshake"></i> Reclamos
            </a>
        </li>
        <li class="nav-item">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarBoleteria"><i class="fas fa-store" aria-hidden="true"></i> Boletería</a>
                <ul class="dropdown-menu" aria-labelledby="navbarBoleteria">
                    <li><a class="dropdown-item" href="/transactions"><i class="fas fa-money-check-alt"></i>&nbsp;Transacciones</a></li>
                </ul>
            </div>        
        </li>
        <li class="nav-item">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarPremios"><i class="fas fa-gift" aria-hidden="true"></i> PREMIOS</a>
                <ul class="dropdown-menu" aria-labelledby="navbarPremios">
                    <li><a class="dropdown-item" href="solicitudes"><i class="fas fa-hand-holding-usd"></i>&nbsp;Solicitudes</a></li>
                </ul>
            </div>
        </li>

        {{-- ACERTIJERO --}}
        @elseif(auth()->user()->role == 'acertijero')
        <li class="nav-item">
            <a class="nav-link" href="/acertijo">
                <i class="ni ni-air-baloon"></i> Ax Equilicuá
            </a>
        </li>
          <div class="nav-item">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink2">
                    <i class="fa fa-gavel" aria-hidden="true" ></i>  Ax Thor 
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="/ticket">
                            <i class="fas fa-ticket-alt"></i> Tickets
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/cash">
                            <i class="far fa-money-bill-alt"></i> Efectivo
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- SUPERVISOR DE ACERTIJERO --}}
         @elseif(auth()->user()->role == 'supacertijero') 
        <li class="nav-item">
            <a class="nav-link" href="/acertijo">
                <i class="ni ni-air-baloon"></i> Ax.Equilicuá
            </a>
        </li>
        <div class="nav-item">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink2">
                    <i class="fa fa-gavel" aria-hidden="true" ></i>  Ax Thor 
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="/ticket">
                            <i class="fas fa-ticket-alt"></i> Tickets
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/cash">
                            <i class="far fa-money-bill-alt"></i> Efectivo
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- ADMINISTRADOR DE PUBLICIDAD  --}}
        @elseif(auth()->user()->role == 'adminpublicidad') 
        <li class="nav-item">
            <a class="nav-link" href="/publicidad">
                <i class="fab fa-adversal"></i> Publicidad
            </a>
        </li>
        {{-- ADMINISTRADOR DE USUARIOS DEL JUEGO --}}
        @elseif(auth()->user()->role == 'adminusuario') 
        <div class="nav-item">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink2">
                    <i class="fa fa-gavel" aria-hidden="true" ></i>  Usuarios
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="/users">
                            <i class="fas fa-ticket-alt"></i> Usuarios Web
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/userwinner">
                            <i class="far fa-money-bill-alt"></i>Ganadores
                        </a>
                    </li>
                     <li>
                        <a class="dropdown-item" href="/winner">
                            <i class="far fa-money-bill-alt"></i>Ganadores / Carrera
                        </a>
                    </li>
                </ul>
            </div>
        </div>
         <li class="nav-item">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarPremios"><i class="fas fa-gift" aria-hidden="true"></i> PREMIOS</a>
                <ul class="dropdown-menu" aria-labelledby="navbarPremios">
                    <li><a class="dropdown-item" href="solicitudes"><i class="fas fa-hand-holding-usd"></i>&nbsp;Solicitudes</a></li>
                </ul>
            </div>
        </li>
        {{-- ADMINISTRADOR DE CODIGOS TICKET PROMOCION --}}
        @elseif(auth()->user()->role == 'adminticket') 
        <li class="nav-item">
            <a class="nav-link" href="/codes">
                <i class="fas fa-ticket-alt"></i> Códigos Promoción
            </a>
        </li>
        {{-- ADMINISTRADOR DE RECLAMOS --}}
        @elseif(auth()->user()->role == 'adminreclamo') 
        <li class="nav-item">
            <a class="nav-link" href="/reclamo">
               <i class="far fa-handshake"></i> Reclamos
            </a>
        </li>
        {{-- ADMINISTRADOR DE CARRERAS --}}
        @elseif(auth()->user()->role == 'admincarrera') 
        <li class="nav-item">
            <a class="nav-link" href="/race">
                <i class="fas fa-flag-checkered"></i> Carreras
            </a>
        </li>
        {{-- SUPERVISOR DE CARRERAS --}}
        @elseif(auth()->user()->role == 'supcarrera') 
        <li class="nav-item">
            <a class="nav-link" href="/race">
                 <i class="fas fa-flag-checkered"></i>Carreras
            </a>
        </li>
            {{-- ATENCION DE CLIENTE --}}
        @elseif(auth()->user()->role == 'acliente') 
        <li class="nav-item">
            <a class="nav-link" href="/atencion">
                <i class="fab fa-adversal"></i> Atención Al Cliente
            </a>
        </li>
        @endif
        
        
        <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); 
        document.getElementById('logout-from').submit();">
           <i class="fa fa-power-off" aria-hidden="true"></i>  {{ __('LOGOUT') }}
        </a>
        <form id="logout-from" action="{{ route('logout') }}" method="post" style="display:none;"
        id="formLogout">
            @csrf
        </form>
        </li>
    </ul>