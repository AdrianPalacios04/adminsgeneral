<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;


class AdminController extends Controller
{
    public function index()
    {
        $client = User::where('estado',1)->paginate(10);
        return view('admin.index', compact('client'));
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(AdminRequest $request)
    {

        //mass assigment: asignacion masiva
        User::create(
            $request->only('name','lastname','email','role')
            + [
                
                'password'=> bcrypt($request->input('password'))
            ]
        );
        $notification = 'El nuevo usuario se ha registrado correctamente';
        return redirect('/client')->with(compact('notification'));

    }
    public function edit($id)
    {
        $client = User::findOrFail($id);
        return view('admin.edit',compact('client'));
    }

    
    public function update(AdminRequest $request, $id)
    {

        //mass assigment: asignacion masiva
        $user = User::findOrFail($id);
        $data = $request->only('name','lastname','email');
        $password = $request->input('password');
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $user->fill($data);
        $user->save();//UPDATE
        $notification = 'La informacion del usuario se ha actualizado correctamente';
        return redirect('/client')->with(compact('notification'));
    }

   
    // public function destroy(User $client)
    // {
    //     $clientName = $client->name;
    //     $client->delete();

    //     $notification = "EL usuario $clientName se ha eliminado correctamente";
    //     return redirect('/client')->with(compact('notification'));
    // }
     public function changeId(User $client,$id)
    {
        $find = User::findOrFail($id);
       $find -> estado = false;
       $find->save();
        $notification = "EL usuario se ha eliminado correctamente";
        return redirect('/client')->with(compact('notification'));
    }
}