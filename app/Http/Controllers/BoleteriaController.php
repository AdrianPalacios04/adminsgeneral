<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Client;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\ClientRequest;

class BoleteriaController extends Controller
{
    //
    public function transactions(){
         $transaction = Transaction::orderBy('id_transaction','desc')->get();
         return view('boleteria.transactions',compact('transaction'));
        //return view('boleteria.transactions');
    }
}
