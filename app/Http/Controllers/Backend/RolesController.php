<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RolesController extends Controller
{
	public function __construct(Role $role, Permission $permission)
	{
		$this->role = $role;
		$this->permission = $permission;
	}

	public function AllAdminRole()
	{
		// dd(Auth::guard('admin')->user()->hasRole('مدير'));
		$adminuser = Admin::where('status', 1)->latest()->get();
		return view('admin.role.admin_role_all', compact('adminuser'));
	} // end method 


	public function AddAdminRole()
	{
		$roles = $this->role::all();
		$permissions = $this->permission::all();
		return view('admin.role.admin_role_create', compact('roles', 'permissions'));
	}



	public function StoreAdminRole(Request $request)
	{

		$image = $request->file('img');
		$name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
		Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
		$save_url = 'upload/admin_images/' . $name_gen;

		$input = $request->all();
		Validator::make($input, [
			'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
			'roles' => 'required',
		])->validate();

		$admin = Admin::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'img' => $save_url,
			'created_at' => Carbon::now()
		]);

		$admin->assignRole($request->input('roles'));

		if ($request->has('permissions')) {
			$admin->givePermissionTo($request->permissions);
		}

		$admin->save();

		$notification = array(
			'message' => trans('admin.admin-created-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('all.admin.user')->with($notification);
	} // end method 



	public function EditAdminRole($id)
	{
		$rolePermissions = DB::table("model_has_permissions")->where("model_has_permissions.model_id", $id)
			->pluck('model_has_permissions.permission_id', 'model_has_permissions.permission_id')
			->all();

		$adminuser = Admin::findOrFail($id);
		$roles = $this->role::all();
		$permissions = $this->permission::all();
		return view('admin.role.admin_role_edit', compact('adminuser', 'roles', 'permissions', 'rolePermissions'));
	} // end method 




	public function UpdateAdminRole(Request $request)
	{

		$admin_id = $request->id;
		$old_img = $request->old_image;

		if ($request->file('img')) {

			unlink($old_img);
			$image = $request->file('img');
			$name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
			$save_url = 'upload/admin_images/' . $name_gen;

			Admin::findOrFail($admin_id)->update([
				'name' => $request->name,
				'email' => $request->email,
				'img' => $save_url,
				'created_at' => Carbon::now(),


			]);

			$admin = Admin::findOrFail($admin_id);
			if ($request->has('roles')) {
				$userRole = $admin->getRoleNames();
				foreach ($userRole as $role) {
					$admin->removeRole($role);
				}

				$admin->assignRole($request->input('roles'));
			}

			if ($request->has('permissions')) {
				$userPermissions = $admin->getPermissionNames();
				foreach ($userPermissions as $permssion) {
					$admin->revokePermissionTo($permssion);
				}

				$admin->givePermissionTo($request->permissions);
			}

			$notification = array(
				'message' => trans('admin.admin-updated-successfully'),
				'alert-type' => 'info'
			);



			return redirect()->route('all.admin.user')->with($notification);
		} else {

			Admin::findOrFail($admin_id)->update([
				'name' => $request->name,
				'email' => $request->email,
				'created_at' => Carbon::now(),

			]);

			$admin = Admin::findOrFail($admin_id);

			if ($request->has('roles')) {
				$userRole = $admin->getRoleNames();
				foreach ($userRole as $role) {
					$admin->removeRole($role);
				}

				$admin->assignRole($request->roles);
			}

			if ($request->has('permissions')) {
				$userPermissions = $admin->getPermissionNames();
				foreach ($userPermissions as $permssion) {
					$admin->revokePermissionTo($permssion);
				}

				$admin->givePermissionTo($request->permissions);
			}

			$notification = array(
				'message' => trans('admin.admin-updated-successfully'),
				'alert-type' => 'info'
			);

			return redirect()->route('all.admin.user')->with($notification);
		} // end else 

	} // end method 


	public function DeleteAdminRole($id)
	{

		$adminimg = Admin::findOrFail($id);
		$img = $adminimg->img;

		if (file_exists(public_path() . 'upload/admin_images/' . $img)) {
			unlink($img);
		}

		Admin::findOrFail($id)->delete();

		$notification = array(
			'message' => trans('admin.admin-deleted-successfully'),
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
	} // end method 


}
