@extends('layouts.panel')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css"> --}}
</head>
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row">
            <div class="col">
                <h3 class="mb-0">Carreras General</h3> 
            </div>
                <div class="row">
                    <div class="col text-right">
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                Filtro de Carreras 
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('race/create')}}">Nueva Carrera</a>
                                <a class="dropdown-item" href="{{url('/race')}}">Carreras del Día</a>
                                <a class="dropdown-item" href="{{url('raceAll')}}">Carreras Totales</a>
                            </div>
                        </div>
                    </div>
                    <div class="col text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" 
                        data-target="#exampleModal" >
                        Configuracion de Evento</button>
                    </div>
                </div>
            @include('race.modal')
        </div>
    </div>

        <div class="card-body">
            <div class="table-responsive">
                {{-- <table border="0" cellspacing="5" cellpadding="5">
                    <tbody>
                        <tr>
                            <td>Minimum date:</td>
                            <td><input type="text" id="min" name="min"></td>
                        </tr>
                        <tr>
                            <td>Maximum date:</td>
                            <td><input type="text" id="max" name="max"></td>
                        </tr>
                    </tbody>
                </table> --}}
                <!-- Projects table -->
                <table class="table table-striped" id="usuarios">
                    <thead >
                        <tr>
                        <th scope="col">inicio</th>
                        <th scope="col">final</th>
                        <th scope="col">Nombre Acertijo</th>
                        <th scope="col">Tipo ticket</th>
                        <th scope="col">Premio</th>
                        <th scope="col">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($racet as $races)
                            
                        <tr>
                            
                            <th width="100px">
                                {{ \Carbon\Carbon::parse($races->inicio)->format('d M, Y H:i' )}}
                            </th>
                            <td width="100px">
                             {{ \Carbon\Carbon::parse($races->final)->format('d M, Y H:i' )}}
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
                            <td width="100px">
                                {{$races->px_1}}
                            </td>
                            <td width="100px">
                                {{$races->px_2}}
                            </td>
                            {{-- <td>
                                {{$races->status->state_race}}
                            </td> --}}
                           
                            
                            {{-- <td>
                                @if ($races->race_state == 1)
                                <form action="{{url('/race/'.$races->id)}}" method="post">
                                    @csrf
                                    
                                    <a href="{{url('/race/'.$races->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                                    
                                    </form>
                                @endif
                                
                            </td> --}}
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $racet->links() }}
                </div>
            </div>
        </div>
      
</div>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
{{-- <script src="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css"></script> --}}


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script> --}}
<script>
    var table = $('#usuarios').DataTable({
      
        "searching": false,
        responsive:true,
        autoWidth:false,
        "ordering":false,
        // "lengthChange": false,
          "paging":false,
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
        },
        // "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"p><"col-sm-4"f>>tip'
    });
    $('#mySearchButton').on( 'keyup click', function () {
    table.search($('#mySearchText').val()).draw();
  } );
  
 

</script>

{{-- Para buscar por fecha : http://live.datatables.net/hiyitago/1/edit --}}

    {{-- <script>
        var minDate, maxDate;
    
    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[4] );
    
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );
    
    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });
    
        // DataTables initialisation
        var table = $('#example').DataTable();
    
        // Refilter the table
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
    </script> --}}
@endsection