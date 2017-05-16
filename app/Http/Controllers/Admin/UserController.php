<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUser;

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

        $users = User::paginate(20);

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

        $roles = $this->getRoles();

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
        $this->authorize('create', User::class);

        $user = new User($request->only(
            'name',
            'email',
            'phone_number',
            'expires_at',
            'info'
        ));
        $user->password = bcrypt($request->get('password'));
        $user->validated = $request->has('validated');

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

        $roles = $this->getRoles();

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

        $user->fill($request->only(
            'name',
            'email',
            'phone_number',
            'expires_at',
            'info'
        ));
        $user->validated = $request->has('validated');

        if ($request->has('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

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
            flash(__('models.user_delete_error'), "error");

            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function validateUser(User $user)
    {
        $this->authorize('validate', $user);

        $user->validated = true;
        $user->save();

        flash(__('models.user_validated_successfully'), 'success');

        return redirect()->back();
    }

    protected function getRoles()
    {
        $roles = Role::pluck('name', 'id');

        // A non-admin user cannot assign the administrator role.
        // Robust validation is done in `StoreUser`, here we just
        // want to hide the role in the select options.
        if (!Auth::user()->isAdmin()) {
            unset($roles['admin']);
        }

        return $roles;
    }
}
