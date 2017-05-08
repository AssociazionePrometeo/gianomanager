<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpdateProfile;
use App\User;
use Illuminate\Http\Request;
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
         $attributes = $request->except('password');

         if ($request->has('password')) {
             $attributes['password'] = bcrypt($request->get('password'));
         }

         $user->update($attributes);

         flash('Il tuo profilo è stato aggiornato.', 'success');

         return redirect()->route('profile');
     }
}
