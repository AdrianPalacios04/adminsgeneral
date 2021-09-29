<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThorTicket;
use App\Models\User;
use Auth;

class ThorTicketController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $thorticket = ThorTicket::orderBy('i_id', 'desc')->paginate(15);
          }elseif(auth()->user()->role == 'supacertijero') {
            $thorticket = ThorTicket::orderBy('i_id', 'desc')->paginate(15);
        }else{
            $thorticket = ThorTicket::where('user_id',Auth::id())->orderBy('i_id', 'desc')->paginate(15);
         }
        return view('thorticket.index',compact('thorticket'));
    }
    public function create()
    {
        return view('thorticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->id());
        $thorticket = $request->all();
        $thorticket['user_id'] = $user->id;
        ThorTicket::create($thorticket);
        $notificacion = "El acertijo se creo correctamente";
        
         return redirect('/ticket')->with(compact('notificacion'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thorticket = ThorTicket::findOrFail($id);
        return view('thorticket.edit',compact('thorticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $thorticket = ThorTicket::findOrFail($id);
        $data = $request->only("t_nombre","t_pregunta1","t_respuesta1","t_pregunta2","t_respuesta2",
        "t_pregunta3","t_respuesta3","t_llave1","t_llave2","t_llave3","pistas_Ax");
        
        $thorticket->fill($data);
        $thorticket->save();//UPDATE
        $notificacion = 'El acertijo se ha actualizado correctamente';
        return redirect('/ticket')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThorTicket $thorticket,$id)
    {
        $thorticket = ThorTicket::findOrFail($id);
        $thorticket->delete();
        $notificacion = "El acertijo se ha eliminado correctamente";
        
        return redirect('/ticket')->with(compact('notificacion'));
    }
    public function changeUseTicket(Request $request)
    {
        $thorticket = ThorTicket::find($request->i_id);
        $thorticket -> i_uso = $request->i_uso;
        //dd($acertijo);
        $thorticket->save();
        return response()->json(['success' => 'Uso Activo']);
    }
}