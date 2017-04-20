<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
        $emailValidation = 'required|email|unique:users,email';
        $passwordValidation = 'required|min:8';

        if ($user = $this->route('user')) {
            $emailValidation .= ",{$user->id}";
            $passwordValidation = 'nullable|min:8';
        }

        return [
            'name'       => 'required',
            'email'      => $emailValidation,
            'password'   => $passwordValidation,
            'phone'      => 'required|min:10',
            'expires_at' => 'required|date',
        ];
    }
}
