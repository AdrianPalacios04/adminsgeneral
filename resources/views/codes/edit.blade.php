@extends('layouts.panel')
@section('content')
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class="card shadow" >
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Nuevo Código </h3>
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
        <form action="{{url('codes/'.$code->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row"> 
                <div class="col-md-2">
                    <div class="form-group">
                        <h4 for="">Código</h4>
                      <input type="text" name="codes" class="form-control" value="{{old('t_nombre',$code->codes)}}" readonly>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <h4 for="">Fecha Inicio</h4>
                        
                      <input type="date" name="f_inicio" class="form-control" value="{{\Carbon\Carbon::parse($code->f_inicio)->format('Y-m-d')}}" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <h4 for="">Fecha Final</h4>
                      <input type="date" name="f_final" class="form-control"  value="{{\Carbon\Carbon::parse($code->f_final)->format('Y-m-d')}}" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group" >
                        <h4>Tipo Ticket</h4>
                        <select class="form-control" name="id_tipo">
                            @foreach($type as $types)
                            <option value="{{$types->id}}">{{$types->tipo}}</option>
                            @endforeach
                        </select>
                       
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <h4>Premio</h4>
                        <input type="number" min="0"  name="cantidad" class="form-control" value="{{old('t_nombre',$code->cantidad)}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <h4>Origen</h4>
                        <input type="text" name="origen" class="form-control"  value="{{old('origen',$code->origen)}}"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <h4>Uso</h4>
                        <input type="number" name="uso" class="form-control" value="{{old('uso',$code->uso)}}"/>
                    </div>
                </div>
                
            </div>
            <div class="col text-right">
                <button type="submit" class="btn btn-success">Crear</button>      
            </div>
          
        </form>
    </div>
</div>
<script>
       function comprobar(obj)
{   
    if (obj.checked)
      document.getElementById('boton').readOnly = false;
    else
      document.getElementById('boton').readOnly = true;
      document.getElementById("boton").value = "";
        
}
</script>
@endsection