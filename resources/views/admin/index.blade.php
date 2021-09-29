@extends('layouts.panel')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Lista Administradores</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('client/create')}}" class="btn btn-sm btn-primary">Registro Usuario</a>
        </div>
        </div>
    </div>
    <div class="card-body">
         @if(session('notification'))
        <div class="alert alert-success" role="alert">
            {{session('notification')}}
        </div>
        @endif
        <div class="table-responsive">
        <!-- Projects table -->
            <table class="table table-striped" id="usuarios">
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Rol</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($client as $clients)
                        
                    <tr>
                        <th >
                            {{$clients->name}}
                        </th>
                        <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:50px;">
                            {{$clients->lastname}}
                        </th>
                        <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:50px;">
                            {{$clients->email}}
                        </td>
                        
                            <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:50px;">
                            @if ($clients->role == 'admin')
                                Administrador General
                            @elseif ($clients->role == 'acertijero')
                                Acertijero
                            @elseif($clients->role == 'supacertijero')
                            Supervisor Acertijero
                            @elseif($clients->role == 'adminpublicidad')
                            Administrador de Publicidad
                            @elseif($clients->role == 'adminusuario')
                            Administrador de Usuarios
                            @elseif($clients->role == 'adminticket')
                            Administrador de Ticket
                            @elseif($clients->role == 'adminreclamo')
                            Adminstrador de Reclamos
                            @elseif($clients->role == 'admincarrera')
                            Administrador de Carrera
                            @elseif($clients->role == 'supcarrera')
                            Supervisor de Carrera
                            @else
                            Atención al Cliente
                            @endif
                        
                        </td>
                        <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:50px;">
                            <form action="{{url('/client/'.$clients->id.'/delete')}}" method="post" class="archiveItem">
                            @csrf
                            @method('PUT')
                            <a href="{{url('/client/'.$clients->id.'/edit')}}" class="btn btn-sm btn-primary" title="Editar"><i class="far fa-edit"></i></a>
                            <!--<button class="btn btn-sm btn-danger" type="submit">Eliminar</button>-->
                            <a  class="btn btn-sm btn-danger" type="submit" onclick="archiveRemove(this)"  id="{{$clients->id}}" 
                                style="color: white" title="Eliminar"><i class="far fa-trash-alt"></i></a> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
              <div class="d-flex justify-content-center">
            {{ $client->links() }}
        </div>  
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
        "lengthChange": false,
        "paging":false,
         "bInfo": false,
        columns: [
                {data: 'name',"orderable": false, "searchable": false},
                {data: 'lastname',"orderable": false, "searchable": false},
                {data: 'email',"orderable": false, "searchable": false},
                {data: 'role'},
                {data: 'btn', "orderable": false, "searchable": false},
                ],
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function archiveRemove(any) {
        var click = $(any);
        var id = click.attr("id");
        swal.fire({
            title: '¿Seguro que quieres eliminarlo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.value) {
               $('a[id="' + id + '"]').parents(".archiveItem").submit();
            }else{
               
            }
        })
    }
</script>
@endsection