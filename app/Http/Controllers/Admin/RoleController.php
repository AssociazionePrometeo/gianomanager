<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.roles.create');
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  StoreRole $request
     * @return Response
     */
    public function store(StoreRole $request)
    {
        $role = new Role($request->only('id', 'name'));
        // @TODO: manage permissions
        $role->permissions = [];
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
        if ($role->isProtected()) {
            flash("Il ruolo {$role->name} non può essere modificato", 'error');

            return redirect()->back();
        }

        return view('admin.roles.edit', compact('role'));
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
        if ($role->isProtected()) {
            flash("Il ruolo {$role->name} non può essere modificato", 'error');

            return redirect()->back();
        }

        $role->update($request->only('name'));

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
        $role->delete();

        return redirect()->route('admin.roles.index');
    }}
