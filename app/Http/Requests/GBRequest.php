<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GBRequest extends FormRequest
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

    public function __construct()
    {
        //Banco de dados Padrão MYSQL
        DB::setDefaultConnection('mysql');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required | max: 100',
            'email' => 'required|string|email|max:255',
            'curso' => 'required | max: 100',
            'inicio' => 'required | date',
            'fim' => 'required | date |after_or_equal:inicio'
        ];
    }

    public function messages(){
        return[
            'required' => 'O campo :attribute não podem estar vazios',
            'fim.after_or_equal'=> 'A Data de Termino tem que ser maior ou igual a Data de Inicío',
        ];
    }
}
