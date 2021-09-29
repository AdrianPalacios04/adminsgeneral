@foreach ($reclamo as $reclamos)
<div class="modal fade" id="exampleModal1{{$reclamos->id_reclamaciones}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{route('message')}}" method="POST">
            @csrf
            <div class="modal-body">
            {{-- Inicio datos que pasa para enviar al correo --}}
                <input type="hidden" name="nombre" value="{{$reclamos->clients->persona->t_nombreper}}">
                <input type="hidden" name="domicilio" value="{{$reclamos->domicilio}}">
                <input type="hidden" name="dni" value="{{$reclamos->clients->persona->c_dniper}}">
                <input type="hidden" name="correlativo" value="{{$reclamos->correlativo}}">
                <input type="hidden" name="celular" value="{{$reclamos->clients->n_celular}}">
                <input type="hidden"  name="fecha_registro" value="{{$reclamos->fecha_registro}}">
                <input type="hidden" name="detalle" value="{{$reclamos->detalle}}">
                <input type="hidden" name="estado" value="{{$reclamos->estado}}">
                <input type="hidden" name="monto_reclamado" value="{{$reclamos->monto_reclamado}}">
                <input type="hidden" name="pedido" value="{{$reclamos->pedido}}">
                <input type="hidden" name="email" value="{{$reclamos->correo}}">
                <input type="hidden" name="id_tipo" value="{{$reclamos->id_tipo}}">
                <input type="hidden" name="id_categoria" value="{{$reclamos->id_categoria}}">
            {{-- Fin de datos que pasa para enviar al correo --}}

            
                <div class="mb-3">
                    <h4 for="exampleFormControlInput1" class="form-label">Correo Electrónico</h4>
                    <input type="email" class="form-control" name="email" value="{{$reclamos->correo}}" readonly>
                </div>
                <div class="mb-3">
                    <h4 class="form-label">Respuesta</h4>
                    <textarea class="form-control"  name="respuesta" rows="4"></textarea>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Enviar">
            </div>
        </form>  
    </div>
    </div>
</div>
@endforeach
