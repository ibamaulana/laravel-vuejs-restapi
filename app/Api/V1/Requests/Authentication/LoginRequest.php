<?php

namespace App\Api\V1\Requests\Authentication;

use Config;
use Dingo\Api\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        $data = [
            'noinduk' => 'required',
            'password' => 'required',
            'kodesekolah' => 'required|min:6',
        ];

        return $data;
    }

    public function authorize()
    {
        return true;
    }
}
