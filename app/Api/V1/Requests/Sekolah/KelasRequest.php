<?php

namespace App\Api\V1\Requests\Sekolah;

use Config;
use Dingo\Api\Http\FormRequest;

class KelasRequest extends FormRequest
{
    public function rules()
    {
        $data = [
            'nama' => 'required',
            'sekolah_id' => 'required',
            'tingkatan_id' => 'required',
        ];

        return $data;
    }

    public function authorize()
    {
        return true;
    }
}
