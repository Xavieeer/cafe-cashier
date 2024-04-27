<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiRequest extends FormRequest
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
    { return [
        'nama_karyawan' => ['required','max:20','string'],
        'tanggal_masuk' => ['required','date'],
        'waktu_masuk' => ['required'],
        'status' => ['required', 'in:sakit,masuk,cuti'],
        'waktu_keluar' => ['required']
    ];
}
public function messages()
{ {
        return [
            'nama_karyawan.required' => 'Nama Karyawan belum diisi!',
            'tanggal_masuk.required' => 'Tanggal Masuk belum diisi!',
            'waktu_masuk.required' => 'Waktu Masuk belum diisi!',
            'status.required' => 'Status belum diisi!',
            'waktu_keluar.required' => 'Waktu Keluar belum diisi!',
        ];
    }
}
}
