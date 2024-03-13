<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemesananRequest extends FormRequest
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
            'tanggal_pemesanan' => ['required', 'date'],
            'jam_mulai' => ['required', 'max:50', 'string'],
            'jam_selesai' => ['required', 'max:20', 'string'],
            'nama_pemesan' => ['required', 'max:50', 'string'],
            'jumlah_pelanggan' => ['required', 'max:50', 'string'],
        ];
    }
    public function messages()
    { {
            return [
                'tanggal_pemesanan.required' => 'Tanggal Pemesanan belum diisi!',
                'jam_mulai.required' => 'jam mulai belum diisi!',
                'jam_selesai.required' => 'jam selesai telepon  belum diisi!',
                'nama_pemesan.required' => 'nama pemesan belum diisi!',
                'jumlah_pelanggan.required' => 'jumlah pelanggan belum diisi!'
            ];
        }
    }
}
