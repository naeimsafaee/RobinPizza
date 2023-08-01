<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id' => ['required'  ],
            'address' => ['required'],
            'lat_lng' => ['required' ],
        ];
    }
}
