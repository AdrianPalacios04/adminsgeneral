@foreach ($atencion as $atent)
<div class="modal fade" id="exampleModal{{$atent->i_idusuario}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">
            Información Adicional
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
           <p><b style="font-weight: bold;font-size: 14px">Usuario: </b><span>{{$atent->t_username}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Correo Electrónico: </b><span >{{$atent->t_correoper}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Número de Celular: </b><span >{{$atent->n_celular}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">DNI: </b><span >{{$atent->persona->c_dniper}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Nombre: </b><span >{{$atent->persona->t_nombreper}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Apellido: </b><span >{{$atent->persona->t_apellidoper}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Fecha de Nacimiento: </b><span >{{$atent->persona->d_nacimientoper}}</span></p>
            <p><b style="font-weight: bold;font-size: 14px">Sexo: </b><span > @if ($atent->persona->c_sexoper == 'H')
                     Masculino
                @else
                    Femenino
                @endif</span></p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
    
@endforeach