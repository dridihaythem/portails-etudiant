<?php

namespace App\Http\Requests\Enseignant;

use Illuminate\Foundation\Http\FormRequest;

class CreateEnseignantRequest extends FormRequest
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
            'department_id' => 'required|numeric',
            'cin' => 'required|numeric|unique:enseignants,cin',
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'photo' => 'sometimes|image',
        ];
    }
}
