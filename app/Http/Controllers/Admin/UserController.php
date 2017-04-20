<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreUser;
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
     * @param StoreUser $request
     * @return Response
     */
    public function store(StoreUser $request)
    {
        User::create($request->all());

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
     * @param  StoreUser $request
     * @return Response
     */
    public function update(User $user, StoreUser $request)
    {
        $attributes = $request->except('password');

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
