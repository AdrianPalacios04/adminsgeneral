<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\TipoPremio;
use Illuminate\Http\Request;
use DB;
class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = Code::orderBy('id','desc')->paginate(15);
        return view('codes.index',compact('code'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $type = TipoPremio::where('premio',30)->get(); // para consultar
        // $type = TipoPremio::all();
        return view('codes.create',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = [];
        for($i = 1; $i <= $request->get('number'); $i++){
            $data[] = [
                'codes' => empty($request->get('codes')) ? $this->generateRandomString(6) : $request->get('codes'),
                // 'codes' => $this->generateRandomString(6),
                'f_inicio' => $request->get('f_inicio'),
                'f_final' => $request->get('f_final'),
                'cantidad' => $request->get('cantidad'),
                'origen' => $request->get('origen'),
                'uso' => $request->get('uso'),
                'id_tipo' => $request->get('id_tipo')
            ];
        }
        
        Code::upsert($data, [
            'codes', 'f_inicio', 'f_final', 'cantidad', 'origen', 'uso','id_tipo'
        ]);
        $notification = "El codigo se creo correctamente";
        return redirect('/codes')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show(Code $code)
    {
        //
    }
    public function edit($id)
    {
        $code = Code::findOrFail($id);
       $type = TipoPremio::where('premio',30)->get();
        return view('codes.edit',compact('code','type'));
    }
    public function update(Request $request,$id)
    {
        $code = Code::findOrFail($id);
        $code->f_inicio = $request->input('f_inicio');
        $code->f_final = $request->input('f_final');
        $code->id_tipo = $request->input('id_tipo');
        $code->cantidad = $request->input('cantidad');
        $code->origen = $request->input('origen');
        $code->uso = $request->input('uso');
        $code->save();//UPDATE
        $notification = 'El codigo de promoción actualizado correctamente';
         return redirect('/codes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = Code::findOrFail($id);
        // dd($code);
         $code->delete();
         $notification = "El codigo se ha eliminado correctamente";
         return redirect('/codes')->with(compact('notification'));
    }
    public static function generateRandomString($length = 20) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function deleteAll(Request $request)
    {
        $id = $request->id;
        DB::table("codes")->whereIn('id',explode(",",$id))->delete();
        return response()->json(['success'=>"Codes Deleted successfully."]);
    }
    
}

// https://stackoverflow.com/questions/41297116/how-to-generate-unique-voucher-code-in-laravel-5-2