<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InvoiceRequest extends FormRequest
{

    public function rules()
    {
        return [
            'user_id' => 'required|string|max:9',
            'amount' =>  'required|numeric|min:0|not_in:0',
            'issuance_date' => 'required|date',
            'cnpj_sender' => 'required|string|max:14',
            'name_sender' => 'required|string|max:100',
            'cnpj_carrier' => 'required|string|max:14',
            'name_carrier' => 'required|string|max:100'
        ];
    }


    public function messages()
    {
        return [
            'amount' => 'O campo amount precisa ser maior que 0.',
            'issuance_date' => 'O campo issuance_date não pode ser uma data futura.',
            'cnpj_sender' => 'O cnpj_sender precisa ser um CNPJ válido.',
            'name_sender' => 'O campo name_sender  deve ter no máximo 100 caracteres.',
            'name_carrier' => 'O campo name_carrier deve ter no máximo 100 caracteres.',
            'cnpj_carrier' => 'O cnpj_carrier precisa ser um CNPJ válido.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Erro na validação. Por favor, verifique os dados informados e tente novamente!',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
