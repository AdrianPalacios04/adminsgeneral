@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row">
            <div class="col">
                <h3 class="mb-0">Solicitudes de premios</h3>
            </div>
            <!-- <div class="row">

    </div> -->
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="solicitudes">
                <thead>
                    <tr>
                        <!-- <th>&nbsp;</th> -->
                        <th>ESTADO</th>
                        <th>NOMBRE Y APELLIDOS</th>
                        <th>DNI</th>
                        <th>CORREO</th>
                        <th>CELULAR</th>
                        <th>MONTO</th>
                        <th>FECHA DE SOLICITUD</th>
                        <th>ENTIDAD BANCARIA</th>
                        <th>TIPO DE CUENTA</th>
                        <th>CUENTA EN SOLES</th>
                        <th>CUENTA INTERBANCARIA</th>
    

                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitud as $petis)
                    <tr>
                        <!-- <td>&nbsp;</td> -->
                        <td>
                            @if ($petis->status)
                            <span class='badge badge-success'>PAGADO</span>
                            @else
                            <span class='badge badge-warning'>PENDIENTE</span>
                            @endif
                        </td>
                        <td>{{$petis->client->Persona->t_nombreper}}&nbsp;{{$petis->client->Persona->t_apellidoper}}</td>
                        <td>{{$petis->client->Persona->c_dniper}}</td>
                        <td>{{$petis->client->t_correoper}}</td>
                        <td>{{$petis->client->n_celular}}</td>
                        <td>s/&nbsp;{{$petis->monto}}.00</td>
                        <td>{{$petis->fecha_registro}}</td>
                        <td>{{$petis->Banco->banking_entity}}</td>
                        <td>{{$petis->Cuenta->account_type}}</td>
                        <td>{{$petis->account_soles}}</td>
                        <td>{{$petis->interbank_number}}</td>
                        @if (!$petis->status)
                        <td>
                            <form action="{{url('/pagar/'.$petis->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Pagar</button>
                            </form>
                        </td>
                        @endif
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection