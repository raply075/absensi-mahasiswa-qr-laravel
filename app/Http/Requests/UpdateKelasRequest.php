<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKelasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'kode' => [
                'required',
                'string',
                'max:10',
                Rule::unique('kelas', 'kode')->ignore($this->route('kelas')),
            ],
            'nama' => 'required|string|max:100',
            'angkatan' => 'required|digits:4',
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode kelas wajib diisi.',
            'kode.unique' => 'Kode kelas sudah digunakan.',
            'nama.required' => 'Nama kelas wajib diisi.',
            'angkatan.required' => 'Angkatan wajib diisi.',
            'angkatan.digits' => 'Angkatan harus terdiri dari 4 digit.',
        ];
    }
}