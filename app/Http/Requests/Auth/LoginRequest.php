<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest  extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required', 'string',
            'email' => 'required', 'string', 'email'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'messages' => $validator->getMessageBag(),
        ], 400));
    }
}
