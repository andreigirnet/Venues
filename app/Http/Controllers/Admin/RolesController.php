<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(20);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {

        $role = Role::create($request->all());
        $permission_ids = $request->input('permission_id');
        $role->permissions()->attach($permission_ids);
        return redirect(route('roles.index'))->with('success','The role was submitted');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $permission_ids = $request->input('permission_ids');
        $role->permissions()->sync($permission_ids);
        $input = [
            'title'=>$request->title
        ];
        $role->update($input);
        return redirect(route('roles.index'))->with('success','The role was updated');
    }

    public function show(Role $role)
    {

    }

    public function destroy($id)
    {
        $r = Role::findOrFail($id);
        $r->delete();
        return redirect(route('roles.index'))->with('success','The role was deleted');
    }

    public function massDestroy(Request $request)
    {

    }
}
