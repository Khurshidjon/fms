<?php

namespace App\Http\Controllers\User;

use App\Region;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:user create|settings');
    }

    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('backend.Users.index', [
            'is_active' => 'settings',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $roles = Role::all();
        $organs = Region::all();
        $permissions = Permission::all();
        return view('backend.Users.register', [
            'roles' => $roles,
            'organs' => $organs,
            'permissions' => $permissions
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
            'organs' => ['required', 'numeric'],
            'roles' => ['required'],
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->organ_id = $request->organs;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->assignRole($request->roles);
        $user->givePermissionTo($request->permissions);

        return redirect()->route('users.index')->with('success', 'Пользователь был успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        $roles = Role::all();
        return view('backend.Users.show', [
            'user' => $user,
            'is_active' => 'settings',
            'permissions' => $permissions,
            'roles' => $roles
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
        //
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

    public function attachPermissionToRole(User $user, Permission $permission)
    {
        $user->givePermissionTo($permission);
        return redirect()->back();
    }

    public function revokePermissionToRole(User $user, Permission $permission)
    {
        $user->revokePermissionTo($permission);
        return redirect()->back();
    }

    public function assignRoleToPermission(User $user, Role $role)
    {
        $user->assignRole($role);
        return redirect()->back();
    }

    public function removeRoleFromPermission(User $user, Role $role)
    {
        $user->removeRole($role);
        return redirect()->back();
    }
}
