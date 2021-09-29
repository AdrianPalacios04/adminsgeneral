
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-h4ledby="exampleModalh4" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalh4">Configuración de Carrera</h4>
          <button type="button" class="close" data-dismiss="modal" aria-h4="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('updateConfig')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <h4 for="recipient-name" class="col-form-h4">Cantidad de Ax CASH:</h4>
              <input type="text" class="form-control" name="cant_ax_cash" id="cant_ax_cash" value={{$con->cant_ax_cash}}>
            </div>
            <div class="form-group">
              <h4 for="message-text" class="col-form-h4">Cantidad de Ax TICKET</h4>
               <input type="text" class="form-control" name="cant_ax_ticket" id="cant_ax_ticket" value={{$con->cant_ax_ticket}}>
            </div>
            <div class="form-group">
              <h4 for="message-text" class="col-form-h4">Comienzo del EVENTO</h4>
               <input type="time" class="form-control" name="inicio" id="inicio" value={{$con->inicio}}>
            </div>
            <div class="form-group">
              <h4 for="message-text" class="col-form-h4">INTERVALO</h4>
               <input type="time" class="form-control" name="intervalo" id="intervalo" value={{$con->intervalo}}>
            </div>
            <div class="form-group">
              <h4 for="message-text" class="col-form-h4">Duración de Juego</h4>
               <input type="time" class="form-control" name="duration" id="duration" value={{$con->duration}}>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Guardar" disabled>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 