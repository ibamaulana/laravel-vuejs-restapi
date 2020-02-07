<?php

namespace App\Api\V1\Requests\Jadwal;

use Config;
use Dingo\Api\Http\FormRequest;

class JadwalRequest extends FormRequest
{
    public function rules()
    {
        $data = [
            'nama' => 'required',
            'kelas_id' => 'required',
            'date' => 'required',
        ];

        return $data;
    }

    public function authorize()
    {
        return true;
    }
}
