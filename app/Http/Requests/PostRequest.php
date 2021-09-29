<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
        // dd($this->cash);
        return [
            // 't_nombre'=>['required','unique:mysql_connect_3.tc_thorpaga']
            't_nombre'=>['required', Rule::unique('mysql_connect_3.tc_thorpaga')->ignore($this->cash,'i_id')]
        ];
    }
    public function messages()
    {
        return [
            't_nombre.unique' => 'El titulo ya ha sido registrado'
        ];
    }
}
