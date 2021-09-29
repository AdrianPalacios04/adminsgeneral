

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('marca')}}" method="post">
          <div class="modal-body">
              <input type="text" class="form-control" name="marcas" id="marcas">
            </div>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="addCode" disabled>Save changes</button>
        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
//  $('body').on('click','#addCode',function(event) {
//        // var marcas =  $(this).data('marcas');
//         var marcas = $('#marcas').val();
//     $.ajax({
//         type:"POST",
        
//         url:"{{url('marca')}}",
//         data:{
//             "_token": "{{ csrf_token() }}", // toquen para el metodo POST
//             'marca':marcas // variable que se necesita 
//         },
//         success:function(res){
//             window.location.reload(); //refrescar la página
//         }
//     })
// })


</script>

