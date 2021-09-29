@extends('layouts.panel')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row justify-content-end">
            <div class="col">
                <h3 class="mb-0">Atención al Cliente/Usuarios WEB</h3>
            </div>
        </div>
    </div>
        {{-- <label class="custom-toggle">
            <input type="checkbox" class="toggle-class"  
            data-toggle="toggle" data-style="slow" >
            <span class="custom-toggle-slider rounded-circle"></span>
        </label> --}}
    <div class="card-body">
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
                   
                    
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach ($atencion as $atent)
                    <tr>
                        <th scope="row">
                            <button type="button" class="btn btn-sm" data-toggle="modal" 
                                data-target="#exampleModal{{$atent->i_idusuario}}" title="Información Adicional">
                                <i class="fa fa-search-plus" aria-hidden="true"></i></button>
                        </th>
                        <th scope="row">
                            {{$atent->t_username}}
                        </th>
                        <td>
                            {{$atent->persona->t_nombreper}}
                        </td>
                          <td>
                            {{$atent->persona->t_apellidoper}}
                        </td>
                        <td>
                            {{$atent->t_correoper}}
                        </td>
                        <td>
                            {{$atent->n_celular}}
                        </td>
                       
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            @include('atencion.modal')
            
        </div>
        <div class="d-flex justify-content-center">
            {{ $atencion->links() }}
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
