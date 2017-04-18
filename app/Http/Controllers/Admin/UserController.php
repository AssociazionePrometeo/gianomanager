<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }
    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'mobile_number' =>'required|min:10',
            'end_date' => 'required|date',
            'info'
        ]);

        User::create($request->only('name', 'email', 'password', 'mobile_number', 'end_date', 'info'));

        return redirect()->route('admin.users.index');
    }
    /**
     * Display the specified user.
     *
     * @param User  $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    /**
     * Show the form for editing the specified user.
     *
     * @param  User  $user
     * @return Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  User $user
     * @param $request
     * @return Response
     */
    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8',
            'mobile_number' =>'required|min:10',
            'end_date' => 'required|date',
            'info'
        ]);

        $attributes = $request->only('name', 'email');

        if ($request->has('password')) {
            $attributes['password'] = $request->get('password');
        }

        $user->update($attributes);

        return redirect()->route('admin.users.index');
    }
    /**
     * Remove the specified user from storage.
     *
     * @param  User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
