<html>
<meta charset="UTF-8"/>
<meta charset="ISO-8859-1">
<style>
    * {
        font-size: 13px;
        height: 30px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }
    #hoja {
        width: 300px;
        text-align: center;
    }
    #respuesta {
        height: 100px;
        margin-top: 100px;
    }
    #firma {
        text-align: center;
    }
    #pedido {
        width: 300px;
    }
    #datos {
        background-color: #c7cbd1;
    }
</style>
<body>
    <table border="1" style="width:800px;border-collapse: collapse;height: 700px;">
    <tr>
        <td colspan="5" style="text-align: center;background-color:#c7cbd1; font-weight: bold;">LIBRO DE RECLAMACIONES</td>
        <td id="hoja" rowspan="2" style="text-align: center; font-weight: bold;">HOJA DE RECLAMACIÓN
            <br>
            <?php 
                $length = 5;
                $stringer = $reclamo['correlativo'];
                echo str_pad($stringer,$length,"0", STR_PAD_LEFT);
            ?>
            
        </td>
    </tr>
    <tr>
        <th>FECHA</th>
        <th>{{ \Carbon\Carbon::parse($reclamo['fecha_registro'])->format('d')}}</th>
        <th colspan="2">{{ \Carbon\Carbon::parse($reclamo['fecha_registro'])->format('M')}}</th>
        <th>{{ \Carbon\Carbon::parse($reclamo['fecha_registro'])->format('Y')}}</th>
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
        <td id="datos" colspan="6" style="background-color:#c7cbd1;font-weight: bold;">
            1. IDENTIFICACIÓN DEL CONSUMIDOR RECLAMANTE
        </td>
    </tr>

    <tr>
        <td colspan="6"><b>NOMBRE:</b><span>{{$reclamo['nombre']}}</span> </td>
    </tr>
    <tr>
        <td colspan="6"><b>DOMICILIO:<span></span></b></td>
    </tr>
    <tr>
        <td colspan="2"><b>DNI/CE:</b><span>{{$reclamo['dni']}}</span></td>
        <td colspan="4"><b>TELEFONO/EMAIL:</b><span>{{$reclamo['celular']}}</span></td>
    </tr>
    <tr>
        <td id="datos" colspan="6"  style="background-color:#c7cbd1;font-weight: bold;">
            2. IDENTIFICACIÓN DEL BIEN CONTRATADO
        </td>
    </tr>
    <tr>
        <td><b>PRODUCTO</b></td>
       <td style="text-align: center"> 
            @if ($reclamo['id_categoria'] == 1)
            X
            @endif
        </td>
        <td colspan="4" rowspan="2">
            <b>MONTO RECLAMADO:</b><span>{{$reclamo['monto_reclamado']}}</span>
        </td>
    </tr>
    <tr>
        <td><b>SERVICIO</b></td>
       <td style="text-align: center"> 
            @if ($reclamo['id_categoria'] == 2)
            X
            @endif
        </td>
    </tr>
    <tr>
        <td id="datos" colspan="6" style="background-color:#c7cbd1;font-weight: bold;">3. DETALLE DE LA RECLAMACIÓN Y PEDIDO DEL CONSUMIDOR</td>
    </tr>
    <tr>
        <td><b>RECLAMO</b></td>
        <td style="text-align: center">
            @if ($reclamo['id_tipo'] == 2)
            X
            @endif
           
        </td>
        <td colspan="4" rowspan="2">
            <b>DETALLE:</b><span>{{$reclamo['detalle']}}</span> 
            </td>
    </tr>
    <tr>
        <td><b>QUEJA</b></td>
        <td style="text-align: center"> @if ($reclamo['id_tipo'] == 1)
            X
            @endif</td>
    </tr>
    <tr>
        <td colspan="5" rowspan="2">
            <b>PEDIDO:</b><span> {{$reclamo['pedido']}}</span>
        </td>
        <td style=" height: 70px">
        </td>
    </tr>
    <tr>
        <td id="firma" style="font-weight: bold;" align="center">FIRMA DEL CONSUMIDOR</td>
    </tr>
    <tr>
        <td id="datos" colspan="6" style="background-color:#c7cbd1;font-weight: bold;">4. OBSERVACIONES Y ACCIONES ADOPTADAS POR EL PROVEEDOR</td>
    </tr>
    <tr style="text-align: center;font-weight: bold;">
        <td colspan="2" >FECHA DE RESPUESTA</td>
        <td>{{ \Carbon\Carbon::now()->format('d')}}</td>
        <td>{{ \Carbon\Carbon::now()->format('M')}}</td>
        <td>{{ \Carbon\Carbon::now()->format('Y')}}</td>
        <td rowspan="2" style="font-weight: bold; font-size: 30px; font-family: Latin Modern Roman 10;font-style: oblique;"> {{ Auth::user()->name}}</td>
    </tr>
    <tr>
        <td id="pedido" colspan="5" rowspan="2">
            <b>RESPUESTA:</b>
            <span>
                {{$reclamo['respuesta']}}
            </span>
        </td>
    </tr>
    <tr>
        <td id="firma" style="font-weight: bold;" align="center">FIRMA DE PROVEEDOR</td>
    </tr>
</table>
</body>


</html>
