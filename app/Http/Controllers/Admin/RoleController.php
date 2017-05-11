<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('view', Role::class);

        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new group.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);

        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  StoreRole $request
     * @return Response
     */
    public function store(StoreRole $request)
    {
        $this->authorize('create', Role::class);

        $role = new Role($request->only('id', 'name', 'permissions'));
        $role->save();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified role.
     *
     * @param Role  $role
     * @return Response
     */
    public function show(Role $role)
    {
        $this->authorize('view', $role);

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  Role  $role
     * @return Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        if ($role->isProtected()) {
            flash("Il ruolo {$role->name} non può essere modificato", 'error');

            return redirect()->back();
        }

        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified role in storage.
     *
     * @param  Role $role
     * @param  StoreRole $request
     * @return Response
     */
    public function update(Role $role, StoreRole $request)
    {
        $this->authorize('update', $role);

        if ($role->isProtected()) {
            flash("Il ruolo {$role->name} non può essere modificato", 'error');

            return redirect()->back();
        }

        $role->update($request->only('name', 'permissions'));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified group from storage.
     *
     * @param  Role  $role
     * @return Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
