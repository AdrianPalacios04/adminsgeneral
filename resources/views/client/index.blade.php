@extends('layouts.panel')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row justify-content-end">
            <div class="col">
                <h3 class="mb-0">Usuario WEB</h3>
            </div>
            <div class="col text-right">
                <div class="row justify-content-end ">
                    <div class="col-md-6">
                        <!--<div class="input-group mb-4">-->
                        <!--    <div class="input-group-prepend">-->
                        <!--      <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>-->
                        <!--    </div>-->
                        <!--    <input class="form-control" placeholder="Search" type="text">-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
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
                <thead>
                   <tr>
                   <th></th>
                    <th scope="col">Usuario</th>
                     <th scope="col">Nombre </th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo Electrónico</th>
                    <th scope="col">Celular</th>
                    
                    <th></th>
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach ($client as $clients)
                    <tr>
                        <th scope="row">
                            <button type="button" class="btn btn-sm" data-toggle="modal" 
                                data-target="#exampleModal{{$clients->i_idusuario}}" title="Información Adicional">
                                <i class="fa fa-search-plus" aria-hidden="true"></i></button>
                        </th>
                        <th scope="row">
                            {{$clients->t_username}}
                        </th>
                        <td>
                            {{$clients->persona->t_nombreper}}
                        </td>
                         <td>
                            {{$clients->persona->t_apellidoper}}
                        </td>
                        <td>
                            {{$clients->t_correoper}}
                        </td>
                        <td>
                            {{$clients->n_celular}}
                        </td>
                      
                        <td>
                            <form action="{{url('/users/'.$clients->i_idusuario)}}" method="post">
                            @csrf
                            <a href="{{url('/users/'.$clients->i_idusuario.'/edit')}}" class="btn btn-sm btn-primary" title="Editar"><i class="fas fa-edit"></i></a>
                            </form>
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
            {{ $client->links() }}
        </div> 
             @include('client.modal')
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
        "ordering":false,
        "lengthChange": false,
        "paging":false,
        "bInfo": false,

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