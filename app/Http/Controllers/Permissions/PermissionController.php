<?php

namespace App\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:settings');
    }

    public function index()
    {
        $permissions = Permission::latest()->paginate(10);
        return view('backend.Permissions.index', [
            'permissions' => $permissions,
            'is_active' => 'settings'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Permissions.create', [
            'is_active' => 'settings'
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
        Permission::create($request->all());
        return redirect()->route('permissions.index')->with('success', 'Разрешение успешно создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        $roles = Role::all();
        return view('backend.Permissions.show', [
            'is_active' => 'settings',
            'roles' => $roles,
            'permission' => $permission,
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
        $permission = Permission::findById($id);
        return view('backend.Permissions.edit', [
            'is_active' => 'settings',
            'permission' => $permission
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
        $permission = Permission::findById($id);

        $request->validate([
            'name' => 'required|string:255'
        ]);
        $permission->update($request->all());
        return redirect()->route('permissions.index')->with('success', 'Разрешение успешно обновлено');
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


    public function assignRoleToPermission(Role $role, Permission $permission)
    {
        $permission->assignRole($role);
        return redirect()->back();
    }

    public function removeRoleFromPermission(Role $role, Permission $permission)
    {
        $permission->removeRole($role);
        return redirect()->back();
    }


}
