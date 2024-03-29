<?php

namespace App\Http\Requests\Specialite;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecialiteRequest extends FormRequest
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
            'name' => 'required',
            'department_id' => 'required|integer|exists:departments,id',
            'prefix' => 'required|min:1|max:10'
        ];
    }
}
