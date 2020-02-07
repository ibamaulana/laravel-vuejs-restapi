<?php

namespace App\Api\V1\Requests\Sekolah;

use Config;
use Dingo\Api\Http\FormRequest;

class TingkatanRequest extends FormRequest
{
    public function rules()
    {
        $data = [
            'nama' => 'required',
        ];

        return $data;
    }

    public function authorize()
    {
        return true;
    }
}
