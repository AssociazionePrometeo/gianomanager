<?php

namespace App\Http\Controllers\User;

<<<<<<< HEAD
use App\Http\Requests\User\UpdateProfile;
=======
>>>>>>> add row user profile page and corrected a /home route
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
<<<<<<< HEAD

  /**
   * Show the form for editing the specified user.
   *
   * @param  User  $user
   * @return Response
   */
    public function edit()
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
    {
    $user = User::all()->except(Auth::id());

    return view('user.profile', compact('user'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
>>>>>>> add row user profile page and corrected a /home route


}
