<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class ProjectDetailStoreRequest extends FormRequest
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
            'project_id' => 'required',
            'description_detail' => 'required|max:900',
            'update_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'description_detail.required' => 'Deskripsi detail program wajib diisi.',
            'description_detail.max' => 'Deskripsi detail program maksimal 900 karakter.',
            'update_date.required' => 'Tanggal diperbarui wajib dipilih.',
        ];
    }

}
