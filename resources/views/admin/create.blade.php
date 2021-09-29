@extends('layouts.panel')

@section('content')
<div class="card shadow" >
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Nuevo Usuario</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('client')}}" class="btn btn-sm btn-danger">
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
        <form action="{{url('client')}}" method="post">
            @csrf
             <div class="row"> 
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Nombre</h4>
                        <input type="text" name="name" class="form-control"  required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 for="">Apellido</h4>
                      <input type="text" name="lastname" class="form-control"  required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h4 for="">E-mail</h4>
                      <input type="email" name="email" class="form-control"  required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h4>Password</h4>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <h4 for="password">Rol Asignado</h4>
                        <select class="form-control" data-toggle="select" title="Simple select" name="role">
                            <option value="admin">Administrador General</option>
                            <option value="acertijero">Acertijero</option>
                            <option value="supacertijero">Supervisor Acertijero</option>
                            <option value="adminpublicidad">Administrador de Publicidad</option>
                            <option value="adminusuario">Administrador de Usuarios</option>
                            <option value="adminticket">Administrador de Ticket</option>
                            <option value="adminreclamo">Administrador Reclamos</option>
                            <option value="admincarrera">Administrador de Carrera</option>
                            <option value="supcarrera">Supervisor de Carrera</option>
                            <option value="acliente">Atención al Cliente</option>
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
@endsection