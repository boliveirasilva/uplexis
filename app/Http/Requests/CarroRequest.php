<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroRequest extends FormRequest
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
            'search_term' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'search_term.required' => 'Por favor informe um termo de pesquisa.',
            'search_term.min' => 'O termo de pesquisa precisa conter ao menos 2 caracteres.'
        ];
    }
}
