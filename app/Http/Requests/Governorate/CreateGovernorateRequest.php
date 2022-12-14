<?php

namespace App\Http\Requests\Governorate;

use Illuminate\Foundation\Http\FormRequest;

class CreateGovernorateRequest extends FormRequest
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
            'name' => 'required|string',
        ];
    }
    public function messages ()
    {
        return [
            'name.required' => 'يرجى ادخال اسم المحافظة',
            'name.string' => 'اسم المحافظة يجب ان يكون نص',

        ];
    }

}
