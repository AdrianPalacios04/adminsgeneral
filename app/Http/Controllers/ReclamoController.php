<?php

namespace App\Http\Controllers;

use App\Models\Reclamo;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReclamoMail;
use PDF;

class ReclamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reclamo = Reclamo::with('clients')->get();
        $reclamo = Reclamo::all();
        return view('reclamo.index',compact('reclamo'));
    }
    
      public function Message(Request $request)
    {
         //inicio datos para enviar al pdf
        $data['domicilio'] = $request->domicilio;
        $data['correlativo'] = $request->correlativo;
        $data['nombre'] = $request->nombre; 
        $data['apellido'] = $request->apellido;
        $data['fecha_registro'] = $request->fecha_registro;
        $data['dni'] = $request->dni;
        $data['celular'] = $request->n_celular;
        $data['monto_reclamado'] = $request->monto_reclamado;
        $data['detalle'] = $request->detalle;
        $data['id_tipo'] = $request->id_tipo;
        $data['id_categoria'] = $request->id_categoria;
        $data['pedido'] = $request->pedido;
        $data['respuesta'] = $request->respuesta;
        $data['detalle'] = $request->detalle;
        //fin de datos para enviar al pdf
        
        $pdf = PDF::loadView("reclamo.pdf.pdf",$data);
        $correo = new ReclamoMail($request->all());
         $correo->attachData($pdf->output(),'Reclamo - The Online Race.pdf');
        $envio = Mail::to($request->get('email'),'The Online Race')->send($correo);
        
        // cambio de estado si se envio o no 
        //  Reclamo::where('email',$request->email)->where('estado', false)->update(['estado' => true]);
       
         $notificacion = "Se envio el correo correctamente";
    
         return redirect('/reclamo')->with(compact('notificacion'));
    }
    
}