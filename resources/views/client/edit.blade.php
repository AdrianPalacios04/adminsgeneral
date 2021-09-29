@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Editar Usuario Web</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('/users')}}" class="btn btn-sm btn-danger">
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
        <form action="{{url('users/'.$client->i_idusuario)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                     <div class="form-group">
                        <h5 >Usuario</h5>
                        <input type="text" name="t_username" class="form-control" value="{{$client->t_username}}" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h5 >Correo Electronico</h5>
                        <input type="email" name="t_correoper"  class="form-control" value="{{$client->t_correoper}}"  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <h5 >N° Celular</h5>
                      <input type="text" name="n_celular"  class="form-control" value="{{$client->n_celular}}"  />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <h5 >DNI</h5>
                        <input type="number" name="c_dniper"  class="form-control" value="{{$client->persona->c_dniper}}"  />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <h5 >Nombre </h5>
                        <input type="text" name="t_nombreper"  class="form-control" value="{{$client->persona->t_nombreper}}"  />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <h5 >Apellido </h5>
                        <input type="text" name="t_apellidoper"  name ="t_apellido" class="form-control" value="{{$client->persona->t_apellidoper}}"  />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <h5> Fecha de Nacimiento</h5>
                        <input type="date" name="d_nacimientoper" class="form-control" value="{{$client->persona->d_nacimientoper}}"/>
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