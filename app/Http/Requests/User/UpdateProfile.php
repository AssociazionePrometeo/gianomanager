<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateProfile extends FormRequest
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
        $user = Auth::user();
        $emailValidation = 'required|email|unique:users,email,'.$user->id;
        $passwordValidation = 'nullable|min:8';


        return [
            'email'      => $emailValidation,
            'password'   => $passwordValidation,
            'phone_number'      => 'required|min:10',
          ];
    }
}
