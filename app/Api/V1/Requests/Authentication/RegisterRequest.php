<?php

namespace App\Api\V1\Requests\Authentication;

use Config;
use Dingo\Api\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        $data = [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'noinduk' => 'required',
            'kota_id' => 'required',
            'sekolah_id' => 'required'
        ];

        return $data;
    }

    public function authorize()
    {
        return true;
    }
}
