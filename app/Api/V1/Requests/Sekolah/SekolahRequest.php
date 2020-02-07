<?php

namespace App\Api\V1\Requests\Sekolah;

use Config;
use Dingo\Api\Http\FormRequest;

class SekolahRequest extends FormRequest
{
    public function rules()
    {
        $data = [
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'status' => 'required'
        ];

        return $data;
    }

    public function authorize()
    {
        return true;
    }
}
