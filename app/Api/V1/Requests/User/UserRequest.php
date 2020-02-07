<?php

namespace App\Api\V1\Requests\User;

use Config;
use Dingo\Api\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        $data = [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'noinduk' => 'required',
            'level' => 'required'
        ];

        return $data;
    }

    public function authorize()
    {
        return true;
    }
}
