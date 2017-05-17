<?php

namespace App\Http\Controllers\User;

use App\Services\EmailVerifier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UpdateProfile;

class ProfileController extends Controller
{
   /**
   * Show the form for editing the current user.
   *
   * @return Response
   */
    public function edit()
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    /**
     * Update the current user in storage.
     *
     * @param  UpdateProfile $request
     * @param  EmailVerifier $verifier
     * @return Response
     */
     public function update(UpdateProfile $request, EmailVerifier $verifier)
     {
         $user = Auth::user();
         $attributes = $request->only('phone_number');

         if ($request->has('password')) {
             $attributes['password'] = bcrypt($request->get('password'));
         }

         if ($request->get('email') !== $user->email) {
             $user->new_email = $request->get('email');
             $verifier->sendVerification($user);
             flash(__('auth.new_verification_email_sent'), 'success');
         }

         $user->update($attributes);

         flash(__('models.user_updated_successfully'), 'success');

         return redirect()->route('profile');
     }
}
