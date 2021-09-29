@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Crear Nueva Carrera</h3>
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
        <form action="{{url('race')}}" method="post">
            @csrf
            <div class="row"> 
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>FECHA INICIO</h5>
                         <?php
                        date_default_timezone_set("America/Lima");
                        // Obteniendo la fecha actual del sistema con PHP
                        $fechaActual = date('Y-m-d\TH:i');
                        ?>
                        <input type="datetime-local"  name="inicio"  class="form-control"  min="<?php echo $fechaActual;?>"value="<?php  echo $fechaActual;?>">
                    </div>
                    <div class="form-group">
                        <h5>FECHA FINAL</h5>
                        <input type="datetime-local" name="final" class="form-control"  min="<?php echo $fechaActual;?>"value="<?php  echo $fechaActual;?>"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <H5 for="">TIPO TICKET</H5>
                        <select class="form-control" name="id_px" id="id_px">
                            <option>Seleccione algun tipo</option>
                            @foreach($type as $types)
                            <option value="{{$types->id}}">{{$types->tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <H5 for="">NOMBRE DEL ACERTIJO</H5>
                        <select name="id_ax" class="form-control" id="id_ax">
                        </select>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <H5 for="">PREMIO</H5>
                        <input type="number" class="form-control" name="px_1" id="px_1" step="0"/>
                    </div>
                    <div class="form-group">
                      
                        <H5>CONTROL</H5>
                        <input type="number" class="form-control" name="px_2" id="px_2" >
                    </div>  
                </div>
            </div>
            <div class="col text-right">
               <button type="submit" class="btn btn-success" id="enviar" disabled>Guardar</button>
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
