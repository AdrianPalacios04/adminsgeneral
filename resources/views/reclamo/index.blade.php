@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row justify-content-end">
        <div class="col">
            <h3 class="mb-0">Reclamo y/o quejas</h3>
        </div>
         {{-- <div class="col text-right">
            {{-- <a href="{{url('acertijo/create')}}" class="btn btn-sm btn-primary">Nuevos Acertijos</a> --}}
            {{-- <div class="row justify-content-end ">
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="input-group mb-4">
                      <input class="form-control" placeholder="Search" type="date">
                      <button>assad</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>  --}}
        </div>
    </div>
    <div class="card-body">
        @if(session('notificacion'))
        <div class="alert alert-success" role="alert">
            {{session('notificacion')}}
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table table-striped">
            <thead>
                <tr style="text-align:center">
                    <th></th>
                    <th>Correlativo</th>
                <th scope="col">Usuario</th>
                <th scope="col">Contestar a</th>
                <th scope="col">Tipo Reclamo</th>
                <th scope="col">Monto Reclamado</th>
                <th scope="col">Tipo Categoria</th>
                <th scope="col">Pedido</th>
                <th scope="col">Detalle</th>
                <th scope="col">Fecha</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reclamo as $reclamos)
                <tr style="text-align:center">
                    <td>
                        <button type="button" class="btn btn-sm" data-toggle="modal" 
                            data-target="#exampleModal{{$reclamos->id_reclamaciones}}" >
                            <i class="fa fa-search-plus" aria-hidden="true"></i></button>
                    </td>
                    <td>{{$reclamos->correlativo}}</td>
                    <td scope="row">
                        {{$reclamos->clients->t_username}}
                    </td>
                    <td>
                        {{$reclamos->medio->medio_comunica}}
                    </td>
                    <td>
                        {{$reclamos->tipo->tipo_reclamo}}
                    </td>
                    <td>
                        @if ($reclamos->monto_reclamado == null)
                            Vacío
                        @else
                            {{$reclamos->monto_reclamado}}
                        @endif
                    </td>
                    <td>
                        {{$reclamos->categoria->tipo_categoria}}
                    </td>
                    <td  style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">
                        {{$reclamos->pedido}}
                    </td>
                    <td  style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">
                        {{$reclamos->detalle}}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($reclamos->fecha_registro)->format('d M, Y')}}
                    </td>                    
                    <td>
                        <button type="button" class="btn btn btn-sm btn-success" data-toggle="modal" 
                        data-target="#exampleModal1{{$reclamos->id_reclamaciones}}" title="Responder Correo" >
                        <i class="far fa-comments"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @include('reclamo.modal')
        @include('reclamo.envio')
        {{-- <div class="d-flex justify-content-center">
            {{ $reclamo->links() }}
        </div>   --}}
    </div>
</div>
    
@endsection