

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Página</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('/page')}}" method="post">
            @csrf
            <div class="modal-body">
                <h5>Nueva Pagina</h5>
                <input type="text" class="form-control" name="nom_pagina" id="pagina">
              </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-primary" id="addCode">Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- <script>
     $('body').on('click','#addCode',function(event) {
           // var marcas =  $(this).data('marcas');
            var marcas = $('#pagina').val();
        $.ajax({
            type:"POST",
            
            url:"{{url('page')}}",
            data:{
                "_token": "{{ csrf_token() }}", // toquen para el metodo POST
                'nom_pagina':marcas // variable que se necesita 
            },
            success:function(res){
                window.location.reload(); //refrescar la página
            }
        })
    })
    
    
    </script> --}}
    
  
  