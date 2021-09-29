@extends('layouts.panel')

@section('content')
<meta charset="UTF-8">
<div class="card shadow" >
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Nuevo Código Promocional</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('codes')}}" class="btn btn-sm btn-danger">
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
        <form action="{{url('codes')}}" method="post">
            @csrf
            <div class="row"> 
                <div class="col-md-2">
                    <div class="form-group">
                        <h5># CÓDIGO A GENERAR</h5>
                        <input type="number" min="1" max="1000" name="number" id="number" class="form-control" value="1" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 for="">NUEVO CÓDIGO PROMOCIONAL</h5>
                      <input type="text" name="codes" class="form-control" id="codes" maxlength="50" readonly>
                    </div>
                </div>
                 <div class="col-md-1">
                    <div class="form-group">
                        <label for=""></label>
                        <div class="custom-control custom-checkbox mb-3">
                        <input class="custom-control-input" id="customCheck1" onChange="comprobar(this);" type="checkbox">
                        <label class="custom-control-label" for="customCheck1">Escribir Código</label>
                      </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5 for="">FECHA INICIO</h5>
                           <?php
                            // Obteniendo la fecha actual del sistema con PHP
                            $fechaActual = date('Y-m-d');
                            ?>
                      <input type="date" name="f_inicio" class="form-control" value="<?php  echo $fechaActual;?>" min="<?php  echo $fechaActual;?>" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5 for="">FECHA FINAL</h5>
                      <input type="date" name="f_final" class="form-control" value="<?php  echo $fechaActual;?>" min="<?php  echo $fechaActual;?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <h5>CANTIDAD DE PROMOCIÓN</h5>
                        <input type="number" min="1"  name="cantidad" class="form-control" value="100" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <h5>TIPO DE CANJE</h5>
                        <select class="form-control" name="id_tipo">
                            @foreach($type as $types)
                            <option value="{{$types->id}}">{{$types->tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <h5>ORIGEN</h5>
                        <input type="text" name="origen" class="form-control" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>USO DE CÓDIGO</h5>
                        <input type="number" min="1"  max="99999"name="uso" class="form-control" value="1"/>
                    </div>
                </div>
                
            </div>
            <div class="col text-right">
                <button type="submit" class="btn btn-success">Guardar</button>      
            </div>
        </form>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--La cantidad maxima de caracteres-->
<script>
    var maxLength = 50;
    $('#codes').keyup(function() {
        var textlen = maxLength - $(this).val().length;
        $('#rchars').text(textlen);
        if (textlen == 0) {
            Swal.fire({
            icon: 'error',
            text: 'Limite de caracteres alcanzado',
            })
        }
    });
</script>   
<!--Para la checkbox-->
<script>
    function comprobar(obj)
{   
 if (obj.checked){
    document.getElementById('codes').readOnly = false;
   document.getElementById('number').readOnly = true;
   document.getElementById("number").value = "1";
 }
  
     
 else{
    document.getElementById('codes').readOnly = true;
   document.getElementById("codes").value = "";
   document.getElementById('number').readOnly = false;
   document.getElementById("number").value = "";

 }
     
   
     
}
</script>

@endsection