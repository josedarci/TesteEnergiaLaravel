<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        return [
            'name'          =>'required|max:255',
            'email'         =>'required|email|max:255',
            'telefone'      =>'required|max:255',
            'estado'        =>'required|max:255',
            'cidade'        =>'required|max:255',
            'dtnascimento'  =>'required|max:255'
        ];
    }
}
