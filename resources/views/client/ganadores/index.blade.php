@extends('layouts.panel')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row justify-content-end">
            <div class="col">
                <h3 class="mb-0">Usuarios Ganadores / Participantes</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table table-striped" id="usuarios">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th scope="col">FECHA</th>
                        <th>HORA</th>
                        <th scope="col">NOMBRE DE LA CARRERA</th>
                        <th scope="col">TIPO PREMIO</th>
                        <th>PREMIO</th>
                        <th>CANTIDAD DE REGISTRO</th>
                        
                    </tr>
                </thead>
                <tbody>
                        @foreach ($win as $races)
                        <tr>
                            <th scope="row">
                                <button type="button" class="btn btn-sm" data-toggle="modal" 
                                    data-target="#exampleModal{{$races->id}}" >
                                    <i class="fa fa-search-plus" aria-hidden="true"></i></button>
                            </th>
                            <th width="100px">
                                {{ \Carbon\Carbon::parse($races->inicio)->format('d M, Y' )}}
                            </th>
                            <th width="100px">
                                {{ \Carbon\Carbon::parse($races->inicio)->format('H:i')}}
                            </th>
                            <td width="100px">
                                @if ($races->id_px == 1)
                                    {{$races->ticket->t_nombre}}
                                @elseif($races->paga != null)
                                    {{$races->paga->t_nombre}}
                                @elseif($races->paga == null)
                                    {{$races->oldticket->t_nombre}}
                                @else
                                    No se encontro
                                @endif 
                            </td>
                            <td width="100px">
                               {{$races->premio->tipo}}
                            </td>
                            <td>
                              @if ($races->premio->id == 1 )
                                 {{floatval($races->px_1)}} tickets
                                @else
                                S/. {{floatval($races->px_1)}}
                                @endif

                            </td>
                            
                            <td>
                                @if ($races->usercarrera->count() == 0)
                                    Nadie se registro
                                @elseif($races->usercarrera->count() == 1)
                                    {{$races->usercarrera->count()}} Jugador     
                                @else
                                {{$races->usercarrera->count()}} Jugadores    
                                @endif
                                
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
            </table>
             @include('client.ganadores.modal')
            
        </div>
    </div>
    
</div>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#usuarios').DataTable({
        
        responsive:true,
        autoWidth:false,
        // "ordering":false,
        // "lengthChange": false,
         "bInfo": false,
          "searching": false,
          "order": [[ 1, "desc" ]], //or asc 
    // "columnDefs" : [{"targets":1, "type":"date-eu"}],
        // columns: [
        //         {data: 'Fecha',"orderable": false, "searchable": false},
        //         {data: 'Hora',"orderable": false, "searchable": false},
        //         {data: 'DNI',"orderable": false, "searchable": false},
        //         {data: 'Telefono',"orderable": false, "searchable": false},
        //         {data: 'Correo Electronico',"orderable": false, "searchable": false},
        //         {data: 'Carrera',"orderable": false, "searchable": false},
        //         {data: 'Premio',"orderable": false, "searchable": false},
        //         {data: 'Puesto',"orderable": false, "searchable": false},
                
                
        //         ],
        // "paging":false,

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
</script>
@endsection