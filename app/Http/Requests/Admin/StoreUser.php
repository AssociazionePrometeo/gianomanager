<?php

namespace App\Http\Requests\Admin;

use Auth;
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

        $rules = [
            'name'         => 'required',
            'email'        => $emailValidation,
            'password'     => $passwordValidation,
            'phone_number' => 'required|min:10',
            'expires_at'   => 'nullable|date',
            'roles'        => 'required|exists:roles,id',
        ];

        // A non-admin user cannot promote herself or another user to the
        // administrator role. That would allow for privileges escalation.
        if (!Auth::user()->isAdmin()) {
            $rules['roles.*'] = 'not_in:admin';
        }

        return $rules;
    }
}
