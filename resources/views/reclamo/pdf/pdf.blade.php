<html>
<style>
    * {
       justify-content: center;
        height: 25px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        border-collapse: collapse;
    }
</style>

<body>
    <table border="1" style="width: 100%">
        <tr>
            <td  colspan="5" align="center" style="font-weight: bold;background-color: #c7cbd1;">LIBRO DE RECLAMACIONES</td>
            <td  rowspan="2" align="center" style="font-weight: bold">HOJA DE RECLAMACIÓN
                <br>
                <?php 
                $length = 5;
                $stringer = $correlativo;
                echo str_pad($stringer,$length,"0", STR_PAD_LEFT);
            ?>
            </td>
        </tr>
        <tr>
            <th>FECHA</th>
            <th>{{ \Carbon\Carbon::parse($fecha_registro)->format('d')}}</th>
            <th colspan="2">{{\Carbon\Carbon::parse($fecha_registro)->format('M')}}</th>
            <th>{{ \Carbon\Carbon::parse($fecha_registro)->format('Y')}}</th>
        </tr>
        <tr>
            <td colspan="6" style="text-align: center;">
                <span style="margin-right:150px">
                    <b>Ruc: </b>
                        <span>20603928394</span>
                </span>
                <span><b>Razón Social:</b><span> OPERACIONES THOR S.A.C.</span></span></td>
        </tr>
        <tr>
            <td  colspan="6" style="background-color: #c7cbd1;font-weight: bold">
                1.IDENTIFICACION DEL CONSUMIDOR RECLAMANTE
            </td>
        </tr>

        <tr>
            <td colspan="6"><b>NOMBRE:</b><span>{{$nombre}} {{$apellido}}</span> </td>
        </tr>
        <tr>
            <td colspan="6"><b>DOMICILIO:<span>{{$domicilio}}</span></b></td>
        </tr>
        <tr>
            <td colspan="2"><b>DNI/CE:</b><span>{{$dni}}</span></td>
            <td colspan="4"><b>TELEFONO/EMAIL:</b><span>{{$celular}}</span></td>
        </tr>
        <tr>
            <td  colspan="6"  style="font-weight: bold;background-color: #c7cbd1;">
                2.IDENTIFICACION DEL BIEN CONTRATADO
            </td>
        </tr>
        <tr>
            <td >PRODUCTO</td>
            <td style="text-align: center;font-weight: bold">
                @if ($id_categoria == 1)
                X   
            @endif
             </td>
            <td colspan="4" rowspan="2">
                <b>MONTO RECLAMADO:</b><span>{{$monto_reclamado}}</span>
            </td>
        </tr>
        <tr>
            <td>SERVICIO</td>
           <td style="text-align: center;font-weight: bold">
                @if ($id_categoria == 2)
                    X   
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="6" style="font-weight: bold;background-color: #c7cbd1;">3.DETALLE DE LA RECLAMACION Y PEDIDO DEL CONSUMIDOR</td>
        </tr>
        <tr>
            <td>RECLAMO</td>
                <td style="text-align: center;font-weight: bold">
                @if ($id_tipo == 2)
                    X   
                @endif
                
            <   /td>
            <td colspan="4" rowspan="2">
                <b>DETALLE: {{$detalle}}</b>
            </td>

            </td>
        </tr>
        <tr>
            <td>QUEJA</td>
            <td style="text-align: center;font-weight: bold">
                @if ($id_tipo == 1)
                X   
            @endif
            </td>
        </tr>
        <tr>
            <td colspan="5" rowspan="2">
                <p id="pedido">PEDIDO: {{$pedido}}</p>
            </td>
            <td style=" height: 70px">
            </td>
        </tr>
        <tr>
            <td align="center"  style="font-weight: bold">FIRMA DEL CONSUMIDOR</td>
        </tr>
        <tr>
            <td  colspan="6"  style="font-weight: bold;background-color: #c7cbd1;">
                4.OBSERVACIONES Y ACCIONES ADOPTADAS POR EL PROVEEDOR</td>
        </tr>
        <tr style="font-weight: bold;text-align: center">
            <td colspan="2">FECHA DE RESPUESTA</td>
            <td>{{ \Carbon\Carbon::now()->format('d')}}</td>
            <td>{{ \Carbon\Carbon::now()->format('M')}}</td>
            <td>{{ \Carbon\Carbon::now()->format('Y')}}</td>
            {{-- <td>21</td>
            <td>jul</td>
            <td>2021</td> --}}
            <td rowspan="2" style="font-weight: bold; font-size: 30px; font-family: Latin Modern Roman 10;font-style: oblique;"> {{ Auth::user()->name}}</td>
        </tr>
        <tr>
            <td colspan="5" rowspan="2">
                <b>RESPUESTA:</b>
            <span>
                {{$respuesta}}
            </span>
            </td>
        </tr>
        <tr>
            <td align="center"  style="font-weight: bold">FIRMA DE PROVEEDOR</td>
        </tr>
    </table>

</body>

</html>