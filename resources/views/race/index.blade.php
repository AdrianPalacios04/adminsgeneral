@extends('layouts.panel')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
</head>
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Carreras</h3>
            </div>
          <div class="row">
                    <div class="col text-right">
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                Filtro de Carreras 
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if (auth()->user()->role == 'admincarrera')
                                <a class="dropdown-item" href="{{url('race/create')}}">Nueva Carrera</a>
                                <a class="dropdown-item" href="{{url('race')}}">Carreras del Día</a>
                                <!--<a class="dropdown-item" href="{{url('raceAll')}}">Carreras Totales</a>-->
                                @elseif(auth()->user()->role == 'admin')
                                <a class="dropdown-item" href="{{url('race/create')}}">Nueva Carrera</a>
                                <a class="dropdown-item" href="{{url('race')}}">Carreras del Día</a>
                                <!--<a class="dropdown-item" href="{{url('raceAll')}}">Carreras Totales</a>-->
                                @else
                                <a class="dropdown-item" href="{{url('race')}}">Carreras del Día</a>
                                <!--<a class="dropdown-item" href="{{url('raceAll')}}">Carreras Totales</a>-->
                                @endif
                            </div>
                        </div>
                    </div>
                     @if (auth()->user()->role == 'admincarrera')
                    <div class="col text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" 
                        data-target="#exampleModal" >
                        Configuracion de Evento</button>
                     </div>
                    @elseif(auth()->user()->role == 'admin')
                     <div class="col text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" 
                        data-target="#exampleModal" >
                        Configuracion de Evento</button>
                     </div>
                    @endif
                </div>
            @include('race.modal')
        </div>
    </div>
        <div class="card-body">
            @if(session('notificacion'))
        <div class="alert alert-success" role="alert">
            {{session('notificacion')}}
        </div>
        @endif
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table table-striped" id="usuarios">
                    <thead >
                        <tr>
                        <th scope="col">Inicio</th>
                        <th scope="col">Final</th>
                        <th scope="col">Nombre acertijo</th>
                        <th scope="col">Tipo ticket</th>
                        <th scope="col">Premio</th>
                        <th scope="col">Control</th>
                        <th scope="col">Estado</th>
                        <th></th>
                     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($race as $races)
                            
                        <tr>
                            <th>
                                {{ \Carbon\Carbon::parse($races->inicio)->format('d M, Y H:i')}}
                                 <!--{{$races->inicio}}-->
                            </th>
                            <td>
                                {{ \Carbon\Carbon::parse($races->final)->format('d M, Y H:i' )}}
                                <!--{{$races->final}}-->
                            </td>
                           <td width="100px">
                                @if ($races->id_px == 2)
                                    {{$races->paga->t_nombre}}
                                @else
                                    {{$races->ticket->t_nombre}}
                                @endif
                            </td>
                            <td width="100px">
                                {{$races->premio->tipo}}
                            </td>
                            <td>
                                {{$races->px_1}}
                            </td>
                            <td>
                                {{$races->px_2}}
                            </td>
                            <td>
                              @if ($races->race_state == 1 )
                                
                              <span class="badge bg-primary" style="color:white">En proceso</span>
                                @elseif ($races->race_state == 2)
                                <span class="badge" style="color:white;background-color: #2B8314">En ejecución</span>
                                @elseif ($races->race_state == 3)
                                <span class="badge bg-success" style="color:white">Resulta</span>
                                @elseif ($races->race_state == 4)
                                <span class="badge bg-danger" style="color:white">Finalizada</span>                                  
                              @endif  
                            </td>
                            <td>
                                  @if ($races->race_state == 1)
                                  @if(auth()->user()->role == 'admincarrera' or  auth()->user()->role == 'admin')
                                <form action="{{url('/race/'.$races->id)}}" method="post">
                                @csrf
                                <a href="{{url('/race/'.$races->id.'/edit')}}" class="btn btn-sm btn-primary" title="Editar"><i class="far fa-edit"></i></a>
                                </form>
                                @endif
                                @endif
                            </td>
                           
                        </tr>
                         
                        @endforeach
                        
                       
                    </tbody>
                    
                </table>
                {{ $race->links() }}
            </div>

        </div>
    
</div>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script>
    var table = $('#usuarios').DataTable({
        paginate:false,
        responsive:true,
        autoWidth:false,
        "ordering":false,
        "lengthChange": false,
        "info": false,
        "language":{
            "lengthMenu":"Mostrar _MENU_ registros por página",
            "zeroRecords":"Nada encontrado",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty":"No hay registro",
            "infoFiltered":"(filtrado de _MAX_ registros totales)",
            "search":"Buscar:",
            "paginate":{
                "next":">",
                "previous":"<"
            }
        }
       
    });
    $('#mySearchButton').on( 'keyup click', function () {
    table.search($('#mySearchText').val()).draw();
  } );
</script>

@endsection