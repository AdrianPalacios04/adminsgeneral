<?php

namespace App\Http\Controllers;

use App\Models\Acertijo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AcertijoController extends Controller
{
    
    public function index()
    {
        // $acertijo = Acertijo::paginate(6);
        // //  $acertijo = Acertijo::where('user_id',Auth::id())->paginate(20);
        // return view('acertijo.index', compact('acertijo'));
        //$findUser = User::find(auth()->id());
         if (auth()->user()->role == 'admin') {
            $acertijo = Acertijo::orderBy('i_id', 'desc')->paginate(20);
          }elseif(auth()->user()->role == 'supacertijero') {
             $acertijo = Acertijo::orderBy('i_id', 'desc')->paginate(20);
        }else{
            $acertijo = Acertijo::where('user_id',Auth::id())->where('i_uso',false)->orderBy('i_id', 'desc')->paginate(20);
         }
        
       return view('acertijo.index',compact('acertijo'));
        
    }

    public function create()
    {
        return view('acertijo.create');
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
        $acertijo = $request->all();
        $acertijo['user_id'] = $user->id;
        Acertijo::create($acertijo);
        $notification = "El acertijo se creo correctamente";
        return redirect('/acertijo')->with(compact('notification'));
    }
    public function edit(Request $request, $id)
    {
        $acertijo = Acertijo::findOrFail($id);
        return view('acertijo.edit',compact('acertijo'));
    }

    public function update(Request $request,$id)
    {

        //mass assigment: asignacion masiva
        $acertijo = Acertijo::findOrFail($id);
        $data = $request->only('t_pregunta','t_respuesta','t_pista','t_kword1','t_kword2','t_kword3');
        $acertijo->fill($data);
        $acertijo->save();//UPDATE
        $notification = 'El acertijo se ha actualizado correctamente';
        return redirect('/acertijo')->with(compact('notification'));
    }

    public function destroy(Acertijo $acertijo)
    {
        
        $acertijo->delete();
        $notification = "El acertijo se ha eliminado correctamente";
        return redirect('/acertijo')->with(compact('notification'));
    }
    public function changeUse(Request $request)
    {
        $acertijo = Acertijo::find($request->i_id);
        $acertijo->i_uso = $request->i_uso;
        //dd($acertijo);
        $acertijo->save();
        return response()->json(['success' => 'Uso Activo']);
    }
}