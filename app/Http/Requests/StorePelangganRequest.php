<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'max:50', 'string'],
            'email' => ['required', 'max:50', 'string'],
            'nomor_telepon' => ['required', 'max:20', 'string'],
            'alamat' => ['required', 'max:50', 'string'],
        ];
    }
    public function messages()
    { {
            return [
                'nama.required' => 'Nama belum diisi!',
                'email.required' => 'email belum diisi!',
                'nomor_telepon.required' => 'nomor telepon  belum diisi!',
                'alamat.required' => 'alamat belum diisi!'
            ];
        }
    }
}
