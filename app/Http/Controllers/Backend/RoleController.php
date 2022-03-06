<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
        $this->middleware('permission:إنشاء صلاحية,admin');
    }

    public function index()
    {
        $roles = $this->role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles',
            'permissions' => 'nullable'
        ]);

        $role = $this->role->create([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return response()->json("تم إنشاء الدور", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->role::findOrFail($id);
        $permissions = $this->permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.roles_edit', compact('role', 'permissions', 'rolePermissions'));
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
        Role::findOrFail($id)->update([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);

        $role = Role::findOrFail($id);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->input('permissions'));
            $role->syncPermissions($request->input('permissions'));
        }

        return redirect()->route('role.index')->with('success', 'تم تعديل الدور بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => trans('admin.category-deleted-successfully'),
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
