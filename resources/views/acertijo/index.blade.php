@extends('layouts.panel')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<div class="card shadow">
    
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Acertijo de Equilicuá</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('acertijo/create')}}" class="btn btn-sm btn-primary">Nuevo Acertijo</a>
            
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
                <th></th>
                <th scope="col">Pregunta</th>
                <th scope="col">Respuesta</th>
                <th scope="col">Ruta</th>
                <th scope="col">Llave 1</th>
                <th scope="col">Llave 2</th>
                <th scope="col">Llave 3</th>
                 @if (auth()->user()->role == 'admin' or auth()->user()->role == 'supacertijero')
                <th scope="col">Creador</th>
                <th socpe="col">Uso</th>
                 @endif
                 <th scope=""></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($acertijo as $acertijos)
                    
                <tr>
                    <td>
                        <button class="btn btn-sm" data-toggle="modal" data-target="#exampleModal{{$acertijos->i_id}}" title="Información Adicional"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                    </td>
                    <th scope="row" style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">
                        {{$acertijos->t_pregunta}}
                    </th>
                    <td>
                        {{$acertijos->t_respuesta}}
                    </td>
                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">
                        {{$acertijos->t_pista}}
                    </td>
                    <td>
                        {{$acertijos->t_kword1}}
                    </td>
                    <td>
                        {{$acertijos->t_kword2}}
                    </td>
                    <td>
                        {{$acertijos->t_kword3}}
                    </td>
                    @if (auth()->user()->role == 'admin' or  auth()->user()->role == 'supacertijero' )
                     <td>
                        {{$acertijos->user->name}}
                    </td>
                    <td> 
                        <label class="custom-toggle">
                        <input type="checkbox" class="toggle-class" data-id="{{ $acertijos->i_id }}" 
                        data-toggle="toggle" data-style="slow" data-label-off="No" data-label-on="Yes" {{ $acertijos->i_uso == true ? 'checked' : ''}}>
                        <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                    </td>
                     @endif
                    <td>
                        
                        <form action="{{url('/acertijo/'.$acertijos->i_id)}}" method="post" class="archiveItem">
                        @csrf
                        @method('DELETE')
                        <a href="{{url('/acertijo/'.$acertijos->i_id.'/edit')}}" class="btn btn-sm btn-primary" title="Editar"><i class="far fa-edit"></i></a>
                        <a  class="btn btn-sm btn-danger" type="submit" onclick="archiveRemove(this)"  i_id="{{$acertijos->i_id}}" 
                                    style="color: white" title="Eliminar"><i class="far fa-trash-alt"></i></a> 
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!--Modal -->
         @include('acertijo.modal')
        <div class="d-flex justify-content-center">
            {{ $acertijo->links() }}
        </div>  
        <!-- end Modal -->
        
        
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
        "paging": false,
        "lengthChange": false,
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
       //alert(i_uso);
        var i_id = $(this).data('id');
        //alert(i_id);
        $.ajax({
            type:'GET',
            dataType:'JSON',
            url: '{{route('changeUse')}}',
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

    
