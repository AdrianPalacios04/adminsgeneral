
@foreach ($thorpaga as $thorpagas)
<div class="modal fade" id="exampleModal{{$thorpagas->i_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Acertijo Thor Paga</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <p><b style="font-weight: bold;font-size: 14px">Título: </b><span >{{$thorpagas->t_nombre}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Pregunta N°1: </b><span >{{$thorpagas->t_pregunta1}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Respuesta N°1: </b><span >{{$thorpagas->t_respuesta1}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Pregunta N°2: </b><span >{{$thorpagas->t_pregunta2}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Respuesta N°2: </b><span >{{$thorpagas->t_respuesta2}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Pregunta N°3: </b><span >{{$thorpagas->t_pregunta3}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Respuesta N°3: </b><span >{{$thorpagas->t_respuesta3}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Llave N°1: </b><span >{{$thorpagas->t_llave1}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Llave N°2: </b><span >{{$thorpagas->t_llave2}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Llave N°3: </b><span >{{$thorpagas->t_llave3}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Rutas : </b><span >{{$thorpagas->pistas_Ax}}</span></p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
    
@endforeach
