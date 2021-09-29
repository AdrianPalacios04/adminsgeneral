<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\ClientController;
use Illuminate\Validation\Rule;
class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //  dd($this->user);
        return [
            //  't_correoper'=>['required',
            //  'unique:mysql_connect_4.tc_usuario']
            't_correoper' => ['required', Rule::unique('mysql_connect_4.tc_usuario', 't_correoper')->ignore($this->user,'i_idusuario')]
            // 't_correoper'=> 'unique:mysql_connect_4.tc_usuario,,'.$this->user.'|required'
            
        ];
    }
   public function messages()
    {

        return [
            't_correoper.unique' => 'El correo ya ha sido registrado'
        ];
    }
}
