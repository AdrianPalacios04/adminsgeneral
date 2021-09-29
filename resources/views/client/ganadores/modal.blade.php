
@foreach ($win as $races)
<div class="modal fade" id="exampleModal{{$races->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Ganadores / Partipantes</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" style="overflow:scroll;width:500px">
                <div class="form-group" class="col-md-6">
                    {{-- <h4 for="historyReviewList">Participantes / Ganadores</h4> --}}
                    <div class='commentContainer'>
                        <table class="table" >
                            @if ($races->usercarrera->count()<1)
                                    No hay nadie registrado
                            @else
                            <thead>
                                <tr>
                                <th>Usuario</th>
                                <th>Puesto</th>
                                <th>DNI</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($races->usercarrera as $item)
                                    <tr>
                                        <td>{{$item->clients->persona->t_nombreper}}</td>
                                        <td>
                                            @if ($item->puesto == 1)
                                            <span class="badge badge-success">Ganador</span>
                                                @else
                                                <span class="badge badge-danger">No gano</span>
                                            @endif
                                        </td>
                                        <td>{{$item->clients->persona->c_dniper}}</td>
                                        <td>{{$item->clients->n_celular}}</td>
                                        <td>{{$item->clients->t_correoper}}</td>                                
                                    </tr>
                                    @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endforeach


