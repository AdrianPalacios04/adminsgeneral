@extends('layouts.panel')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Códigos Promoción</h3>
        </div>
        <div class="col text-right">
           <a href="{{url('codes/create')}}" class="btn btn-sm btn-primary">Nuevo Código</a>
        </div>
        </div>
    </div>
    <div class="card-body">
        @if(session('notification'))
        <div class="alert alert-success" role="alert">
            {{session('notification')}}
        </div>
        @endif
         <button style="margin-bottom: 10px" class="btn  btn-sm btn-danger delete_all" data-url="{{ url('myproductsDeleteAll') }}">Delete All</button>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th width="50px">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="master">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>
                          </div>
                    </th>
                      <th scope="col">Código</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Final</th>
                    <th scope="col">Tipo Ticket</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Origen</th>
                     <th scope="col">Uso</th>
                    {{-- <th scope="col">Acciones</th> --}}
                   <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($code as $codes)
                        
                    <tr>
                        <td><input type="checkbox" class="sub_chk" data-id="{{$codes->id}}"></td>
                        <td>
                            {{$codes->codes}}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($codes->f_inicio)->format('d M, Y')}}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($codes->f_final)->format('d M, Y')}}
                        </td>
                        <td>
                            @if ($codes->id_tipo == 1 )
                                
                              <span class="badge bg-warning" color="white">Ticket Amarillo</span>
                             @else
                                <span class="badge bg-success" color="white">Ticket Verde</span>                                  
                              @endif  
                        </td>
                        <td>
                            {{$codes->cantidad}}
                        </td>
                        <td>
                            {{$codes->origen}}
                        </td>
                        <td>
                            {{$codes->uso}}
                        </td>
                        <td>
                            <form action="{{url('/codes/'.$codes->id)}}" method="post" class="archiveItem">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('/codes/'.$codes->id.'/edit')}}" class="btn btn-sm btn-primary" title="Editar"><i class="far fa-edit"></i></a>
                             <a  class="btn btn-sm btn-danger" type="submit" onclick="archiveRemove(this)"  id="{{$codes->id}}" style="color:white" title="Eliminar"><i class="far fa-trash-alt"></i></a> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
            {{ $code->links() }}
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
        "paging":false,
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });
        $('.delete_all').on('click', function(e) {
            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  
            if(allVals.length <=0)  
            {  
                Swal.fire('Seleccione una fila');
            }  else {  
                var check = Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var join_selected_values = allVals.join(","); 
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'id='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                Swal.fire(
                                'Eliminado!',
                                'Los codigos han sido eliminados.',
                                'success'
                                )
                            } else if (data['error']) {
                                   
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                    });
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                        
                    }
                });
            }  
        });
    });
</script>
@endsection