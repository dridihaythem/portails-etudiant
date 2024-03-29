<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'classe_id' => 'required|numeric',
            'cin' => 'required|numeric|unique:students,cin',
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'photo' => 'sometimes|image',
            'birthday' => 'required|date',
            'address' => 'required',
            'phone' => 'sometimes',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'nom',
            'last_name' => 'prenom',
        ];
    }
}
