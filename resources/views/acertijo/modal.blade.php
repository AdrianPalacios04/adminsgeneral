
@foreach ($acertijo as $acertijos)
<div class="modal fade" id="exampleModal{{$acertijos->i_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Acertijo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <!--<p><b>ID : </b><span>{{$acertijos->id}}</span></p>-->
            <p><b style="font-weight: bold;">Pregunta : </b><span >{{$acertijos->t_pregunta}}</span></p>
            <p><b style="font-weight: bold;">Respuesta : </b><span >{{$acertijos->t_respuesta}}</span></p>
            <p><b style="font-weight: bold;">Rutas : </b><span >{{$acertijos->t_pista}}</span></p>
            <p><b style="font-weight: bold;">Llave N°1 : </b><span >{{$acertijos->t_kword1}}</span></p>
            <p><b style="font-weight: bold;">Llave N°2 : </b><span >{{$acertijos->t_kword2}}</span></p>
            <p><b style="font-weight: bold;">Llave N°3 : </b><span >{{$acertijos->t_kword3}}</span></p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
    
@endforeach
