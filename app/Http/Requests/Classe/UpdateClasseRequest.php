<?php

namespace App\Http\Requests\Classe;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClasseRequest extends FormRequest
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
            'specialite_id' => 'required|numeric|exists:specialites,id',
            'number' => 'required|numeric',
            'level' => 'required|numeric|min:1|max:5'
        ];
    }


    public function attributes()
    {
        return [
            'level' => 'le niveau',
            'number' => 'le numero du classe',
        ];
    }
}
