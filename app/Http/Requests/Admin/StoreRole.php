<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRole extends FormRequest
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
        $rules = [
            'name' => 'required',
            'permissions' => 'array',
            'permissions.*' => 'boolean',
        ];

        if ($this->route('role') == null) {
            $rules['id'] = 'required|unique:roles';
        }

        return $rules;
    }
}
