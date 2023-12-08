<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ProjectStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'province_id' => 'required',
            'city_id' => 'required|integer',
            'name' => 'required',
            'description' => 'required|max:900',
            'budget' => 'required|integer|min:1',
            'start_date' => 'required',
            'status' => 'required',
            'lat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'city_id.required' => 'Kota wajib dipilih.',
            'city_id.integer' => 'Kota wajib dipilih.',
            'name.required' => 'Nama program wajib diisi.',
            'description.required' => 'Deskripsi program wajib diisi.',
            'description.max' => 'Deskripsi program maksimal 900 karakter.',
            'budget.required' => 'Anggaran program wajib diisi.',
            'budget.integer' => 'Anggaran program harus berupa angka.',
            'budget.min' => 'Anggaran program minimal 1 rupiah.',
            'start_date.required' => 'Tanggal mulai program wajib dipilih.',
            'status.required' => 'Status program wajib dipilih.',
            'lat.required' => 'Lokasi wajib disisi',
        ];
    }
}
