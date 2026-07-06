<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $mahasiswa = $this->route('mahasiswa');

        return [
            'nim' => [
                'required',
                'max:20',
                Rule::unique('mahasiswa', 'nim')->ignore($mahasiswa),
            ],
            'nama' => 'required|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('mahasiswa', 'email')->ignore($mahasiswa),
            ],
            'no_hp' => 'nullable|max:20',
            'kelas_id' => 'required|exists:kelas,id',
        ];
    }
}