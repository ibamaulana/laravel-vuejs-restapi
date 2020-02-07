<?php

namespace App\Api\V1\Requests\Pengumuman;

use Config;
use Dingo\Api\Http\FormRequest;

class PengumumanRequest extends FormRequest
{
    public function rules()
    {
        $data = [
            'nama' => 'required',
            'deskripsi' => 'required',
        ];

        return $data;
    }

    public function authorize()
    {
        return true;
    }
}
