<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'city_id' => 'required',
            'name' => 'required',
            'description' => 'required|max:900',
            'budget' => 'required|integer|min:1',
            'start_date' => 'required',
            'status' => 'required',
        ];
    }
}
