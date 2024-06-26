<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMejaRequest extends FormRequest
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
                'nomor_meja' => ['required','numeric'],
                'kapasitas' => ['required','numeric'],
                'status' => ['required','in:kosong,penuh'],
        ];
    }

    public function messages()
    { {
            return [
                'nomor_meja.required' => 'Nomor Meja Menu belum diisi!',
                'kapasitas.required' => 'Kapasitas belum diisi!',
                'status.required' => 'Status  belum diisi!',
            ];
        }
    }
    
}
