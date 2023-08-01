<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function rules()
    {
        return [
            'username' => ['required' ,  'unique:clients,username' ],
            'password' => ['required', 'min:8'],
            're_try_Password' => ['required' , 'same:password'],
        ];
    }
}
