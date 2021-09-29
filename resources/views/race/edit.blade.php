@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Editar Carrera</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('/race')}}" class="btn btn-sm btn-danger">
            Cancelar</a>
        </div>
        </div>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach                
                </ul>
            </div>
        @endif
        <form action="{{url('race/'.$race->id)}}" method="post">
            @csrf
            @method('PUT')
           <div class="row"> 
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>FECHA INICIO</h5>
                        <input type="datetime-local"  name="inicio"  class="form-control" value="{{\Carbon\Carbon::parse($race->inicio)->format('Y-m-d\TH:i:s')}}" readonly />
                    </div>
                    <div class="form-group">
                        <h5>FECHA FINAL</h5>
                        <input type="datetime-local" name="final" class="form-control" value="{{\Carbon\Carbon::parse($race->final)->format('Y-m-d\TH:i:s')}}" readonly/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <H5 for="">TIPO TICKET</H5>
                        <select class="form-control" name="id_px" id="id_px">
                            @foreach($type as $types)
                             <option value="{{$types->id}}"{{$findpx == $types->id ? 'selected="selected"':''}}>{{$types->tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <H5 for="">NOMBRE DEL ACERTIJO</H5>
                      <select name="id_ax" class="form-control" id="id_ax">
                          @if ($findpx == 2)
                            @foreach ($thorpaga as $team)
                                <option value="{{$team->i_id}}"{{$findax == $team->i_id ? 'selected="selected"':''}}>{{$team->t_nombre}}</option>
                            @endforeach
                          @else
                            @foreach ($thorticket as $teams)
                                <option value="{{$teams->i_id}}"{{$findax == $teams->i_id ? 'selected="selected"':''}}>{{$teams->t_nombre}}</option>
                            @endforeach
                          @endif
                        
                    </select>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <H5 for="">PREMIO</H5>
                        <input type="number" class="form-control" name="px_1" id="px_1" step="1" value="{{old('px_1',$race->px_1)}}"/>
                    </div>
                    <div class="form-group">
                      
                        <H5>CONTROL</H5>
                        <input type="number" class="form-control" name="px_2" id="px_2" step="1" value="{{old('px_2',$race->px_2)}}">
                    </div>  
                </div>
            </div>

            <div class="col text-right">
                <button type="submit" class="btn btn-success" id="enviar">Guardar</button>
            </div>
        </form>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
    //variables
    var pass1 = $('#px_1');
    var pass2 = $('#px_2');
    function coincidePassword() {
        var valor1 = pass1.val();
        var valor2 = pass2.val();
        
        //condiciones dentro de la función
        if (valor1 != valor2) {
           
            $("#enviar").prop('disabled', true);
        
        }else if(valor2 != valor1){
            
            $("#enviar").prop('disabled', true);
        }
        if(valor1.length != 0 && valor1 == valor2) {

            Swal.fire('Los datos si coinciden, ya puedes guardar');
            $("#enviar").prop('disabled', false);
        }
    
    }
    //ejecuto la función al soltar la tecla
    pass2.keyup(function() {
        coincidePassword();
    });
    pass1.keyup(function () {
        coincidePassword();
    });
});
</script>
<script type="text/javascript">
    var data = [];
     window.onload = function(){
         $("#id_px").change(function(){
             // debugger;
             $('#id_ax').html(' ');
             $.ajax({        
                 // le pido a la url '/utils/provincia' el liostado de loclaidades
                 url: "/tons/" + $(this).val(),
                 method: 'GET',
                 success: function(data) {
                      for (let i = 0; i < data.length; i++) {
                         $('#id_ax').append(data[i].html+"<option value="+data[i].i_id+">"+data[i].t_nombre+"</option>");    
                        //  $("#id_ax").show();    
                         console.log(data);          
                      }
                 }
             });
         });
     }
 </script>
@endsection
