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
            'email' => 'required', 'string', 'email',
            'password' => 'required', 'string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'messages' => $validator->getMessageBag(),
        ], 400));
    }
}
