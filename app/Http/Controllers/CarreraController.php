<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\ThorPaga;
use App\Models\ThorTicket;
use App\Models\TipoPremio;
use App\Models\ConfigCarrera;
use App\Models\CarreraTotal;
use Illuminate\Http\Request;
class CarreraController extends Controller

{
    public function index(Request $request)
    {
        
        $race = Carrera::paginate(20);
        $con = ConfigCarrera::find(1);
        // dd($race);
       
      return view('race.index',compact('race','con'));
    
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $type = TipoPremio::where('premio',30)->get();
        $type = TipoPremio::all();
        $name = Thorticket::all();
        return view('race.create',compact('type','name'));
    }

    public function store(Request $request)
    {        
          $race = $request->all();
       
       Carrera::create($race);

       return redirect('/race')->with(compact('race'));

    }
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera,$id)
    {
        $race = Carrera::findOrFail($id);
        $findpx = $race->id_px;
        $findax = $race->id_ax;
        $thorticket = Thorticket::all();
        $thorpaga = Thorpaga::all();
        $type = TipoPremio::all();
        return view('race.edit',compact('race','type','thorticket','findpx','thorpaga','findax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      
         $race = Carrera::findOrFail($id);
        $race->update([
            "inicio"=> $request->input('inicio'),
            "final"=> $request->input('final'),
            "id_px"=> $request->input('id_px'),
            "id_ax"=> $request->input('id_ax'),
            "px_1"=> $request->input('px_1'),
            "px_2"=> $request->input('px_2')
        ]);
        // $race->fill($data);
        // dd($race);
        //  $race->save();//UPDATE
        $notificacion = "La carrera se ha actualizado correctamente";
         return redirect('/race')->with(compact('notificacion'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
    }
     public function updateConfig(Request $request)
    {   
        // dd($request->all());
        $config = ConfigCarrera::find(1);
         $config->update($request->all());

        // return response()->json([
        //     'message'=> 'Se configuro'
        // ]);
        return redirect()->route('race.index')
        ->with('success','User deleted successfully');{
            
        }
    }
     public function RaceAll()
    {
        $racet = CarreraTotal::orderBy('inicio', 'ASC')->paginate(25);
        
        $con = ConfigCarrera::find(1);
        return view('race.raceall',compact('racet','con'));
    }
    public function getAcertijo($id)
    {
        $find = TipoPremio::findOrFail($id);
       
        if ($find->id == 2) {
            return ThorPaga::all();
        }else{
            return ThorTicket::all();
        }
        // // $exists = TipoPremio::whereId($id)->exists();
        // // return $exists ? ThorTicket::all() : ThorPaga::all();
        // if (TipoPremio::where('id',$find)) {
        //     return "ticket amarillo";
        // }elseif (TipoPremio::where('id',$find)) {
        //     return 'ticket verde';
        // }else{
        //     return "No se encontro nada";
        // }  
    }
}