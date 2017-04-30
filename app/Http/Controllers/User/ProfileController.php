<?php

namespace App\Http\Controllers\User;

<<<<<<< HEAD
<<<<<<< HEAD
use App\Http\Requests\User\UpdateProfile;
=======
>>>>>>> add row user profile page and corrected a /home route
=======
use App\Http\Requests\User\UpdateProfile;
>>>>>>> simple user profile page
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> simple user profile page

  /**
   * Show the form for editing the specified user.
   *
   * @param  User  $user
   * @return Response
   */
    public function edit()
<<<<<<< HEAD
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  User $user
     * @param  StoreUser $request
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

         return redirect()->route('profile');
     }
=======
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
=======
>>>>>>> simple user profile page
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  User $user
     * @param  StoreUser $request
     * @return Response
     */
<<<<<<< HEAD
    public function update(Request $request, $id)
    {
        //
    }
>>>>>>> add row user profile page and corrected a /home route
=======
     public function update(UpdateProfile $request)
     {
         $user = Auth::user();
         $attributes = $request->except('password');

         if ($request->has('password')) {
             $attributes['password'] = bcrypt($request->get('password'));
         }

         $user->update($attributes);

         return redirect()->route('profile');
     }
>>>>>>> simple user profile page


}
