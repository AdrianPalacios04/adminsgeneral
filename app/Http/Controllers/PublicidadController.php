<?php
namespace App\Http\Controllers;
use App\Models\Publicidad;
use App\Models\Orientacion;
use App\Models\Pagina;
use App\Models\EstadoPublicidad;
use App\Models\Posicion;
use Illuminate\Http\Request;
use file;

class PublicidadController extends Controller
{
    public function index()
    {
        // $marca = Marca::with('publicidades')->get('nombre');
        $marca = Pagina::orderBy('nom_pagina','ASC')->get();
        return view('publicidad.index',compact('marca'));
    }
    public function getPublicidad($id)
    {
        // $find = Pagina::findOrFail($id);
        $pubs = Publicidad::where('id_pagina','=',$id)->get();
        //dd($pubs);
         return view('publicidad.publicidades.index',compact('pubs'));
    }
    public function create()
    {
        $estado = EstadoPublicidad::all();
        $orientacion = Orientacion::all();
        $posicion = Posicion::all();
        $pagina = Pagina::orderBy('nom_pagina','ASC')->get();
        return view('publicidad.create',compact('estado','orientacion','posicion','pagina'));
    }
    public function storePagina(Request $request)
    {
        $marca = Pagina::create($request->all());
        // dd($marca);
        return view('publicidad.index',compact('marca'));    
    }
   
    public function store(Request $request)
    {
        $publicidad = new Publicidad();

        $publicidad->nombre = $request->input('nombre');
        $publicidad->link = $request->input('link');
        $publicidad->f_inicio = $request->input('f_inicio');
        $publicidad->f_final = $request->input('f_final');
        $publicidad->id_posicion = $request->input('posicion');
        $publicidad->id_orientacion = $request->input('orientacion');
         $publicidad->id_pagina = $request->input('pagina');
        // $publicidad->id_pagina = $request->$page->id;
        $publicidad->id_estado = $request->input('estado');
        
         if ($request->hasfile('imagen')) {
            $request->hasfile('imagen');
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('imagen/publicidad/',$filename);
            $publicidad->imagen = $filename;
            
         }else {
            return $request;
            $publicidad->imagen = '';
        }
        //dd($publicidad);
        $publicidad->save();
        $notificacion = "Se agrego la publicidad correctamente en el modulo " . $publicidad->pagina->nom_pagina;
        return redirect('/publicidad')->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function show(Publicidad $publicidad)
    {
        //
    }
    public function edit(Request $request,$id)
    {
        $publicidad = Publicidad::find($id);
        $estado = EstadoPublicidad::all();
        $orientacion = Orientacion::all();
        $posicion = Posicion::all();
        $pagina = Pagina::all();
        return view('.publicidad.publicidades.edit',compact('publicidad','estado','orientacion','posicion','pagina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $publicidad = Publicidad::find($id);
        $publicidad->nombre = $request->input('nombre');
        $publicidad->link = $request->input('link');
        $publicidad->f_inicio = $request->input('f_inicio');
        $publicidad->f_final = $request->input('f_final');
        $publicidad->id_posicion = $request->input('posicion');
        $publicidad->id_orientacion = $request->input('orientacion');
        $publicidad->id_pagina = $request->input('pagina');
        $publicidad->id_estado = $request->input('estado');
        
        if ($request->hasfile('imagen')) {
            $request->hasfile('imagen');
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('imagen/publicidad/',$filename);
            $publicidad->imagen = $filename;
            
         }else {
           unset($publicidad->imagen);
        }
        $publicidad->save();//UPDATE
        $notificacion = "Se actualizó la publicidad correctamente en el moduló " . $publicidad->pagina->nom_pagina;
         return redirect('/publicidad')->with(compact('notificacion'));
    }

    public function destroy(Publicidad $publicidad)
    {
        $publicidad->delete();
        $notificacion = "La publicidad se ha eliminado correctamente del moduló " . $publicidad->pagina->nom_pagina;
        return redirect('/publicidad')->with(compact('notificacion'));
    }
    public function getPosicion($id)
    {   
        // $posi = Posicion::findOrFail($id);
        return Orientacion::where('id_posicion','=',$id)->get();
    }
    
}