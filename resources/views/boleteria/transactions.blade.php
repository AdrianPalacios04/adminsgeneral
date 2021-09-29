@extends('layouts.panel')

@section('content')
<!-- </head> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row">
            <div class="col">
                <h3 class="mb-0">Transacciones NIUBIZ</h3>
            </div>
            <div class="row">
                <div class="col text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="transaction">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>TRANSACCIÓN</th>
                        <th>N° PEDIDO</th>
                        <th>FECHA</th>
                        <th>COMPETIDOR</th>
                        <th>CORREO</th>
                        <th>MONTO</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaction as $trans)
                    <tr>
                        <td>&nbsp;</td>
                        <td>{{$trans->id_transaction}}</td>
                        <td>{{$trans->numero_pedido}}</td>
                        <td>{{$trans->fecha_pedido}}</td>
                        <td>{{$trans->client->t_username}}</td>
                        <td>{{$trans->email}}</td>
                        <td>S/.{{$trans->monto}}</td>
                        <td>&nbsp;</td>
                                         
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection