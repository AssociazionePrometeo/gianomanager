<?php

namespace App\Http\Controllers\User;

use Mail;
use App\Http\Requests\User\UpdateProfile;
use App\User;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
     * @return Response
     */
     public function update(UpdateProfile $request)
     {
         $user = Auth::user();
         $attributes = $request->only('email', 'phone_number');

         if ($request->has('password')) {
             $attributes['password'] = bcrypt($request->get('password'));
         }

         if ($attributes['email'] !== $user->email) {
             $user->email_verified = false;
             $user->email_token = str_random(64);
             $email = new EmailVerification($user);
             Mail::to($user->email)->send($email);
             flash(__('auth.new_verification_email_sent'), 'success');
         }

         $user->update($attributes);

         flash('Il tuo profilo è stato aggiornato.', 'success');

         return redirect()->route('profile');
     }
}
