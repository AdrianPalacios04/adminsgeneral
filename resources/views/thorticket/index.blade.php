@extends('layouts.panel')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Acertijos Thor Ticket</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('ticket/create')}}" class="btn btn-sm btn-primary">Nuevos Acertijos</a>
            
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
                <th scope="col">Titulo</th>
                <th scope="col">Pregunta N 1</th>
                {{-- <th scope="col">Respuesta N°1</th> --}}
                <th scope="col">Pregunta N 2</th>
                {{-- <th scope="col">Respuesta N°2</th> --}}
                <th scope="col">Pregunta N 3</th>
                {{-- <th scope="col">Respuesta N°3</th> --}}
                 @if (auth()->user()->role == 'acertijero')
                <th scope="col">Key Word 1</th>
                <th scope="col">Key Word 2</th>
                <th scope="col">Key Word 3</th>
                 @endif
                
                  @if (auth()->user()->role == 'admin' or auth()->user()->role == 'supacertijero')
                    <th scope="col">Ruta</th>
                    <th scope="col">Creador</th> 
                    <th scope="col">Uso</th> 
                  @endif
                <!--<th scope="col">Ruta</th>-->
                <!--<th scope="col">Creador</th> -->
                <!--<th scope="col">Uso</th> -->
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($thorticket as $thortickets)
                    
                <tr>
                    <td>
                        <button type="button" class="btn btn-sm" data-toggle="modal" 
                            data-target="#exampleModal{{$thortickets->i_id}}" title="Información Adicional" >
                            <i class="fa fa-search-plus" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        {{$thortickets->t_nombre}}
                    </td>
                    <td  style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">
                        {{$thortickets->t_pregunta1}}
                    </td>
                    {{-- <td>
                        {{$thortickets->t_respuesta1}}
                    </td> --}}
                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;"> 
                        {{$thortickets->t_pregunta2}}
                    </td>
                    {{-- <td>
                        {{$thortickets->t_respuesta2}}
                    </td> --}}
                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">
                        {{$thortickets->t_pregunta3}}
                    </td>
                    {{-- <td>
                        {{$thortickets->t_respuesta3}}
                    </td> --}}
                     @if (auth()->user()->role == 'acertijero')
                    <td>
                        {{$thortickets->t_llave1}}
                    </td>
                    <td>
                        {{$thortickets->t_llave2}}
                    </td>
                    <td>
                        {{$thortickets->t_llave3}}
                    </td>
                    @endif
                    @if (auth()->user()->role == 'admin' or auth()->user()->role == 'supacertijero')
                        <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">
                        {{$thortickets->pistas_Ax}}
                    </td>
                    <td>
                        {{$thortickets->user->name}}
                    </td>
                       
                    <!--<td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">-->
                    <!--    {{$thortickets->pistas_Ax}}-->
                    <!--</td>-->
                    <!--<td>-->
                    <!--    {{$thortickets->user->name}}-->
                    <!--</td>-->
                    
                    <td>
                        <label class="custom-toggle">
                        <input type="checkbox" class="toggle-class" data-id="{{ $thortickets->i_id }}" 
                        data-toggle="toggle" data-style="slow" {{ $thortickets->i_uso == true ? 'checked' : ''}}>
                        <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                    </td>
                     @endif
                    <td>
                        <form action="{{url('/ticket/'.$thortickets->i_id)}}" method="post" class="archiveItem">
                        @csrf
                        @method('DELETE')
                        <a href="{{url('/ticket/'.$thortickets->i_id.'/edit')}}" class="btn btn-sm btn-primary" title="Editar"><i class="far fa-edit"></i></a>
                         <a  class="btn btn-sm btn-danger" type="submit" onclick="archiveRemove(this)"  i_id="{{$thortickets->i_id}}" 
                                style="color: white" title="Eliminar"><i class="far fa-trash-alt"></i></a> 
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Modal -->
        
        @include('thorticket.modal')
        <div class="d-flex justify-content-center">
                {{ $thorticket->links() }}
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
@push('scripts')
<script>
    $('.toggle-class').change(function() {
        var i_uso = $(this).prop('checked') == true ? 1:0  ;
        alert(i_uso);
        var i_id = $(this).data('id');
        alert(i_id);
        $.ajax({
            type:'GET',
            dataType:'JSON',
            url: '{{route('changeUseTicket')}}',
            data:{
                'i_uso':i_uso,
                'i_id':i_id,
            },
            success:function(data){
              
            }
        });
    });
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function archiveRemove(any) {
        var click = $(any);
        var id = click.attr("i_id");
        swal.fire({
            title: '¿Seguro que quieres eliminarlo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.value) {
               $('a[i_id="' + id + '"]').parents(".archiveItem").submit();
            }else{
               
            }
        })
    }
</script>
    
@endpush

    
