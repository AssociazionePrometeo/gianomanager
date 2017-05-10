<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreUser;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('view', User::class);

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
        $this->authorize('create', User::class);

        $roles = Role::pluck('name', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param StoreUser $request
     * @return Response
     */
    public function store(StoreUser $request)
    {
        $request['password'] = bcrypt($request->get('password'));
        $user = new User($request->all());

        $this->authorize('create', $user);

        $user->save();
        $user->roles()->sync($request->get('roles'));

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
        $this->authorize('view', $user);

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
        $this->authorize('update', $user);

        $roles = Role::pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles'));
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
        $this->authorize('update', $user);

        $attributes = $request->except('password');

        if ($request->has('password')) {
            $attributes['password'] = bcrypt($request->get('password'));
        }

        $user->update($attributes);
        $user->roles()->sync($request->get('roles'));

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
        $this->authorize('delete', $user);

        if ($user->id == \Auth::id()) {
            flash("You cannot delete your account.", "error");

            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
