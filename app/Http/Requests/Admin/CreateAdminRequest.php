<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'cin' => 'required|numeric|unique:admins,cin|unique:students,cin',
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'photo' => 'sometimes|image',
            'phone' => 'sometimes',
        ];
    }
}
