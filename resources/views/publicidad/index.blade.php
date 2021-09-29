@extends('layouts.panel')
@section('content')

<link rel="stylesheet" href="{{asset('css/style.css')}}">
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h2 class="mb-0">Publicidad</h2>
        </div>
          <div class="col text-right">

             <!--<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" disabled >Nueva Pagina</button>-->
             <a href="{{url('publicidad/create')}}" class="btn btn-sm btn-primary ">Registro Publicidad</a>
          </div>
        </div>
    </div>
     <div class="card-body">
        @if(session('notificacion'))
        <div class="alert alert-success" role="alert">
            {{session('notificacion')}}
        </div>
        @endif
    </div>
  <div class="row">
    @foreach ($marca as $marcas)
      <div class="col-md-3">
        <a href="{{url('/publicidad/'.$marcas->id.'/view')}}">
          <div class="card mx-sm-1 p-3 mb-3" id="cards" style="text-decoration: none">
              <h1 style="text-align: center;">{{$marcas->nom_pagina}}</h1>
             
          </div>
        </a>
      </div>
    @endforeach
  </div>
</div>
@include('publicidad.publicidades.pagina')
@endsection
