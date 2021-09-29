@extends('layouts.panel')
@section('content')
<div class="card shadow" >
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0" >Nueva Publicidad </h3>
        </div>
        <div class="col text-right">
            <a href="{{URL::previous()}}" class="btn btn-sm btn-danger">
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
        <form action="{{url('publicidad')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group" >
                        <h5 class="form-label" for="customFile">Imagen Publicitaria</h5>
                        <input type="file" name="imagen" />
                       
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div class="col-md-3">
                    <div class="form-group">
                        <h5 for="">Nombre Publicidad</h5>
                      <input type="text" name="nombre" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                         <h5 for="">Link</h5>
                      <input type="text" name="link" class="form-control" required/>
                    </div>
                </div>
               

                <div class="col-md-3">
                    <div class="form-group" >
                        <h5>Posición</h5>
                        <select class="form-control" name="posicion" id="posicion">
                            <option value="">Seleccione una posicion</option>
                            @foreach ($posicion as $item)
                            
                                <option value="{{$item->id}}">{{$item->t_posicion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <h5 for="">Orientación</h5>
                        <select class="form-control" name="orientacion" id="orientacion">
                          
                            {{-- @foreach ($orientacion as $items)
                                <option value="{{$items->id}}">{{$items->t_orientacion}}</option>
                            @endforeach --}}
                        </select>                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <h5 for="">Fecha Inicio</h5>
                    <input type="date" class="form-control" name="f_inicio" min=<?php $hoy=date("Y-m-d"); echo $hoy;?> value="<?php $hoy=date("Y-m-d"); echo $hoy;?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <h5 for="">Fecha Final</h5>
                    <input type="date" class="form-control" name="f_final" min="<?php $hoy=date("Y-m-d"); echo $hoy;?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <h5 for="">Pagina Web Relacionada</h5>
                      <select name="pagina" class="form-control">
                          @foreach ($pagina as $paginas)
                              <option value="{{$paginas->id}}">{{$paginas->nom_pagina}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                      <h5 for="">Estado</h5>
                      <select name="estado" class="form-control">
                          @foreach ($estado as $estados)
                              <option value="{{$estados->id}}">{{$estados->nom_estado}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
            </div>
             <div class="col text-right">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
{{-- <script src="{{asset('js/ocultar.js')}}"></script> --}}
{{-- <script>
    function thisFileUpload() {
        document.getElementById("file").click();
    };
</script> --}}
{{-- <script>
    $('#posicion').change(event => {
        $.get(`towns/${event.target.value}`,function(res,sta) {
            $('#orientacion').empty();
            res.forEach(element => {
               $("#orientacion").append(`<option value={res.id}>${res.t_orientacion}</option>`); 
            });
        });
    });
</script> --}}
{{-- <script>
    $(document).ready(function(){
      $("#orientacion").change(function(){
        var posicion = $(this).val();
        $.get('twons/'+posicion, function(data){
  //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
          console.log(data);
            var producto_select = 'Seleccione Porducto'
              for (var i=0; i>+data[i].id;i++)
  
              $("#orientacion").html(producto_select);
  
        });
      });
    });
</script> --}}
<script type="text/javascript">
   var data = [];
    window.onload = function(){
        $("#posicion").change(function(){
            // debugger;
            $('#orientacion').html(' ');

            $.ajax({        
                // le pido a la url '/utils/provincia' el liostado de loclaidades
                url: "/twons/" + $(this).val(),
                method: 'GET',
                success: function(data) {
                     for (let i = 0; i < data.length; i++) {
                        $('#orientacion').append(data[i].html+"<option value="+data[i].id+">"+data[i].t_orientacion+"</option>");    
                        // $("#orientacion").show();    
                    // console.log(data);          
                     }
                }
            });
        });
    }
</script>
  
@endsection
