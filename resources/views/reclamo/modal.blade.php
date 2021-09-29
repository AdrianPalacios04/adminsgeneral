
@foreach ($reclamo as $reclamos)
<div class="modal fade" id="exampleModal{{$reclamos->id_reclamaciones}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Reclamo Adicional</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            {{-- <p><b>ID : </b><span>{{$reclamos->i_id}}</span></p> --}}
            <p><b style="font-weight: bold;font-size: 14px" >Usuario : </b><span >{{$reclamos->clients->t_username}}</span></p>
            <p><b  style="font-weight: bold;font-size: 14px">Contestar a : </b><span >{{$reclamos->medio->medio_comunica}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px" >Tipo : </b><span >{{$reclamos->tipo->tipo_reclamo}}</span></p>
            <p><b  style="font-weight: bold;font-size: 14px">Categoria : </b><span >{{$reclamos->categoria->tipo_categoria}}</span></p>
            <p><b style="font-weight: bold" >Monto : </b><span >@if ($reclamos->monto_reclamado == null)
                Vacío
            @else
                {{$reclamos->monto_reclamado}}
            @endif</span></p>
            <p><b style="font-weight: bold;font-size: 14px" >Pedido : </b><span >{{$reclamos->pedido}}</span></p>
            <p><b  style="font-weight: bold;font-size: 14px">Detalle : </b><span >{{$reclamos->detalle}}</span></p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
    
@endforeach
