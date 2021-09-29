<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Persona;
use App\Models\CarreraTotal;
use App\Models\UserCarrera;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Exports\GanadoresExport;
use Maatwebsite\Excel\Facades\Excel;


class ClientController extends Controller
{
   
    public function index()
    {
         $client = Client::paginate(10);
         return view('client.index',compact('client'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $user)
    {
        $client = Client::findOrFail($user);
        $client->update([
            "t_username"=> $request->input('t_username'),
            "t_correoper"=> $request->input('t_correoper'),
            "n_celular"=> $request->input('n_celular'),
        ]);
        $client->persona->update([
            "t_nombreper" => $request->input('t_nombreper'),
            "t_apellidoper" => $request->input("t_apellidoper"),
            "c_dniper" => $request->input('c_dniper'),
            "d_nacimientoper" => $request->input('d_nacimientoper')
        ]);
        // dd($client);
        $notificacion = " Se modifico correctamente";
        return redirect('/users')->with(compact('notificacion'));
    }
    public function UserWinner()
    {
        // $winner = UserCarrera::where('puesto',1)->get();
         $winner = UserCarrera::all();
        return view('client.ganadores.ganador',compact('winner'));
    }
    public function Winner()
    {
        $win = CarreraTotal::all();
        return view('client.ganadores.index',compact('win'));
    
    }
    public function Export()
    {
        return Excel::download(new GanadoresExport, 'Ganadores.xlsx');
    }
}