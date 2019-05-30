<?php

namespace App\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->paginate(10);
        return view('backend.Roles.index', [
            'roles' => $roles,
            'is_active' => 'roles'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Roles.create', [
            'is_active' => 'roles'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string:255'
        ]);
        Role::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Роль была успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        return view('backend.Roles.show', [
            'is_active' => 'roles',
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        return view('backend.Roles.edit', [
            'is_active' => 'roles',
            'role' => $role
        ]);
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
        $role = Role::findById($id);

        $request->validate([
            'name' => 'required|string:255'
        ]);
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Роль успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function attachPermissionToRole(Role $role, Permission $permission)
    {
        $role->givePermissionTo($permission);
        return redirect()->back();
    }

    public function revokePermissionToRole(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission);
        return redirect()->back();
    }
}
