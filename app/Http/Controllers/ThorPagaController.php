<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\ThorPaga;
use App\Models\User;
use Auth;
class ThorPagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $thorpaga = ThorPaga::orderBy('i_id', 'desc')->get();
          }elseif(auth()->user()->role == 'supacertijero') {
            $thorpaga = ThorPaga::orderBy('i_id', 'desc')->get();
        }else{
            $thorpaga = ThorPaga::where('user_id',Auth::id())->orderBy('i_id', 'desc')->get();
         }
        return view('thorpaga.index',compact('thorpaga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thorpaga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $user = User::find(auth()->id());
        $acertijo = $request->all();
        $acertijo['user_id'] = $user->id;
        ThorPaga::create($acertijo);
        $notificacion = "El acertijo se creo correctamente";
        
        return redirect('/cash')->with(compact('notificacion'));
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
        $thorpaga = ThorPaga::findOrFail($id);
        return view('thorpaga.edit',compact('thorpaga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $thorpaga = ThorPaga::findOrFail($id);
        $data = $request->only("t_nombre","t_pregunta1","t_respuesta1","t_pregunta2","t_respuesta2",
        "t_pregunta3","t_respuesta3","t_llave1","t_llave2","t_llave3","pistas_Ax");
        
        $thorpaga->fill($data);
        $thorpaga->save();//UPDATE
        $notificacion = 'El acertijo se ha actualizado correctamente';
        return redirect('/cash')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThorPaga $thorpaga,$id)
    {
        $thorpaga = ThorPaga::findOrFail($id);
        $thorpaga->delete();
        $notificacion = "El acertijo se ha eliminado correctamente";
        
        return redirect('/cash')->with(compact('notificacion'));
    }
    public function changeUsePaga(Request $request)
    {
        $acertijo = ThorPaga::find($request->i_id);
        $acertijo -> i_uso = $request->i_uso;
        //dd($acertijo);
        $acertijo->save();
        return response()->json(['success' => 'Uso Activo']);
    }
}