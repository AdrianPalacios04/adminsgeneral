@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nuevo Acertijo Equilicuá</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('acertijo')}}" class="btn btn-sm btn-danger">
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
        <form action="{{url('acertijo')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>TEXTO ACERTIJO</h5>
                      <textarea name="t_pregunta" rows="10" cols="30" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <h5>RESPUESTA <em>(Poner en mayúscula y sin signos)</em></h5>
                      <input type="text" name="t_respuesta" class="form-control"  onkeyup="mayus(this)" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 for="">RUTA DE PISTAS</h5>
                      <input type="text" name="t_pista" class="form-control" />
                    </div>
                    <div class="form-group">
                        <h5 for="">LLAVE N°1 <em>(Poner en mayúscula y sin signos)</em></h5>
                        <input type="text" name="t_kword1" class="form-control" onkeypress="javascript: return ValidarNumero(event,this)" onkeyup="mayus(this)"/>
                    </div>
                    <div class="form-group">
                        <h5 for="">LLAVE N°2 <em>(Poner en mayúscula y sin signos)</em></h5>
                        <input type="text" name="t_kword2" class="form-control" onkeypress="javascript: return ValidarNumero(event,this)" onkeyup="mayus(this)"/>
                    </div>
                    <div class="form-group">
                        <h5 for="">LLAVE N°3 <em>(Poner en mayúscula y sin signos)</em></h5>
                      <input type="text" name="t_kword3" class="form-control" onkeypress="javascript: return ValidarNumero(event,this)" onkeyup="mayus(this)"/>
                    </div>   
                </div>
            </div>
            <div class="col text-right">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
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
<script>
    function mayus(e) {
    e.value = e.value.toUpperCase();
    e.value = e.value.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
}
</script>
@endpush