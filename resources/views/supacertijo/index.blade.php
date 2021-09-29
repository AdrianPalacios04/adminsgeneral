@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row justify-content-end">
        <div class="col">
            <h3 class="mb-0">Acertijos</h3>
        </div>
         <div class="col text-right">
            {{-- <a href="{{url('acertijo/create')}}" class="btn btn-sm btn-primary">Nuevos Acertijos</a> --}}
            <div class="row justify-content-end ">
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="input-group mb-4">
                      <input class="form-control" placeholder="Search" type="date">
                    </div>
                  </div>
                </div>
            </div>
        </div> 
        </div>
    </div>
    <div class="card-body">
        @if(session('notification'))
        <div class="alert alert-success" role="alert">
            {{session('notification')}}
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                <th scope="col">pregunta</th>
                <th scope="col">respuesta</th>
                <th scope="col">Uso del Acertijo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($acertijo as $acertijos)
                    
                <tr>
                    <th scope="row">
                        {{$acertijos->t_pregunta}}
                    </th>
                    <td>
                        {{$acertijos->t_respuesta}}
                    </td>
                    <td>
                        <form action="" method="post">
                            <input data-id="{{$acertijos->i_id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                         data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $acertijos->i_uso ? 'checked' : '' }}>
                    
                        </form>
                    </td>
                    {{-- <td>
                        <form action="{{url('/acertijo/'.$acertijos->i_id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{url('/acertijo/'.$acertijos->i_id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                        <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
            {{ $acertijo->links() }}
    </div>
</div>

@endsection