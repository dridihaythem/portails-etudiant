<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'cin' => 'required|numeric',
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'nom',
            'last_name' => 'prenom'
        ];
    }
}
