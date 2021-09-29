@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Editar Acertijo Efectivo</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('cash')}}" class="btn btn-sm btn-danger">
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
        <form action="{{url('cash/'.$thorpaga->i_id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>NOMBRE</h5>
                      <input type="text" name="t_nombre" class="form-control" value="{{old('t_nombre',$thorpaga->t_nombre)}}"  required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h5 for="">RUTA DE PISTAS</h5>
                      <input type="text" name="pistas_Ax" class="form-control" value="{{old('pistas_Ax',$thorpaga->pistas_Ax)}}" required/>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 for="">PREGUNTA N°1</h5>
                      
                      <textarea name="t_pregunta1" id="" class="form-control" rows="10" required>{{$thorpaga->t_pregunta1}}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" >
                        <h5>PREGUNTA N°2</h5>
                  
                        <textarea name="t_pregunta2" id="" class="form-control" rows="10" required>{{$thorpaga->t_pregunta2}}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" >
                        <h5>PREGUNTA N°3</h5>
                        
                        <textarea name="t_pregunta3" id="" class="form-control" rows="10" required>{{$thorpaga->t_pregunta3}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 for="">RESPUESTA N°1 <em>(Poner en mayúscula y sin signos)</em></h5>
                      <input type="text" name="t_respuesta1" class="form-control" value="{{old('t_respuesta1',$thorpaga->t_respuesta1)}}" onkeyup="mayus(this)" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 for="">RESPUESTA N°2 <em>(Poner en mayúscula y sin signos)</em></h5>
                      <input type="text" name="t_respuesta2" class="form-control"  value="{{old('t_respuesta2',$thorpaga->t_respuesta2)}}" onkeyup="mayus(this)" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 for="">RESPUESTA N°3 <em>(Poner en mayúscula y sin signos)</em> </h5>
                      <input type="text" name="t_respuesta3" class="form-control" value="{{old('t_respuesta3',$thorpaga->t_respuesta3)}}" onkeyup="mayus(this)" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 for="">LLAVE N°1 <em>(Poner en mayúscula y sin signos)</em></h5>
                      <input type="text" name="t_llave1" class="form-control" onkeypress="javascript: return ValidarNumero(event,this)" value="{{old('t_llave1',$thorpaga->t_llave1)}}" onkeyup="mayus(this)" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 for="">LLAVE N°2 <em>(Poner en mayúscula y sin signos)</em></h5>
                      <input type="text" name="t_llave2" class="form-control"  onkeypress="javascript: return ValidarNumero(event,this)" value="{{old('t_llave2',$thorpaga->t_llave2)}}" onkeyup="mayus(this)" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 for="">LLAVE N°3 <em>(Poner en mayúscula y sin signos)</em> </h5>
                      <input type="text" name="t_llave3" class="form-control" onkeypress="javascript: return ValidarNumero(event,this)" value="{{old('t_llave3',$thorpaga->t_llave3)}}" onkeyup="mayus(this)" required/>
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

<script>
    function ValidarNumero(e, campo) {
        key = e.keyCode ? e.keyCode : e.which;
        if (key == 32) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Esta poniendo espacio',
                })
            return false;
        }
    }
</script>
<!--Para mayusculas y quitar las tildes -->
<script>
function mayus(e) {
    e.value = e.value.toUpperCase();
    e.value = e.value.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
}
</script>
@endsection