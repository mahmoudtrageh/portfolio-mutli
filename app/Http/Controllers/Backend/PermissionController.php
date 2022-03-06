<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware('admin');
    }
    public function index()
    {
        $permissions = $this->permission::all();

        return view('admin.permission.index', compact('permissions'));
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
            'name' => 'required'
        ]);

        $this->permission->create([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);
        
        return redirect()->route('permission.index')->with('success', 'تم إنشاء الصلاحية بنجاح');
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
        $permission = $this->permission::findOrFail($id);

        return view('admin.permission.permission_edit', compact('permission'));
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
        Permission::findOrFail($id)->update([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);
        
        return redirect()->route('permission.index')->with('success', 'تم تعديل الدور بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();

    	$notification = array(
			'message' => trans('admin.category-deleted-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function getAllPermissions()
    {
        $permissions = $this->permission::all();
        return response()->json([
            'permissions' => $permissions
        ], 200);
    }
}
