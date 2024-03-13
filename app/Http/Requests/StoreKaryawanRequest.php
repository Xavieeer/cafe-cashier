<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKaryawanRequest extends FormRequest
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
            'nip' => ['required', 'numeric'],
            'nik' => ['required', 'max:50', 'string'],
            'nama' => ['required', 'max:20', 'string'],
            'jenis_kelamin' => ['required', 'max:50', 'in:perempuan,laki - laki'],
            'tempat_lahir' => ['required', 'max:50', 'string'],
            'tanggal_lahir' => ['required','date'],
            'telpon' => ['required', 'max:50', 'string'],
            'agama' => ['required', 'max:50', 'string'],
            'status_nikah' => ['required', 'in:belum nikah,nikah'],
            'alamat' => ['required', 'max:50', 'string'],
            'foto' => ['required', 'max:50', 'string']
        ];
    }

    public function messages()
    { {
            return [
                'nip.required' => 'Nip karyawan belum diisi!',
                'nik.required' => 'Nik karyawan belum diisi!',
                'nama.required' => 'Nama Kayawan  belum diisi!',
                'jenis_kelamin.required' => 'Jenis Kelamin belum diisi!',
                'tempat_lahir.required' => 'Tempat lahir belum diisi!',
                'tanggal_lahir.required' => 'Tanggal lahir belum diisi!',
                'telpon.required' => 'No telepon belum diisi!',
                'agama.required' => 'Agama belum diisi!',
                'status_nikah.required' => 'Status Nikah belum diisi!',
                'alamat.required' => 'Alamat belum diisi!',
                'foto.required' => 'Foto belum diisi!'
            ];
        }
    }
}
