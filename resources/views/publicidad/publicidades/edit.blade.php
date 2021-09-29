@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Editar Publicidad</h3>
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
        <form action="{{url('publicidad/'.$publicidad->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                      <input type="text" name="nombre" class="form-control" placeholder="" value="{{old('nombre',$publicidad->nombre)}}"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                         <h5 for="">Link</h5>
                      <input type="text" name="link" class="form-control" value="{{old('link',$publicidad->link)}}"/>
                    </div>
                </div>
               

                <div class="col-md-3">
                    <div class="form-group" >
                        <h5>Posición</h5>
                        <select class="form-control" name="posicion" id="posicion">
                            
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
                          
                            @foreach ($orientacion as $items)
                                <option value="{{$items->id}}">{{$items->t_orientacion}}</option>
                            @endforeach
                        </select>                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <h5 for="">Fecha Inicio</h5>
                    <input type="date" class="form-control" name="f_inicio" value="{{old('f_inicio',$publicidad->f_inicio)}}" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <h5 for="">Fecha Final</h5>
                    <input type="date" class="form-control" name="f_final" value="{{old('f_final',$publicidad->f_final)}}" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <h5 for="">Pagina Web Relacionada</h5>
                      <select name="pagina" class="form-control">
                          <option value="{{$publicidad->pagina->id}}">{{$publicidad->pagina->nom_pagina}}</option>
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
                           <option value="{{$publicidad->estado->id}}">{{$publicidad->estado->nom_estado}}</option>
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