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

    }

    public function update(Request $request, Role $role)
    {

    }

    public function show(Role $role)
    {

    }

    public function destroy(Role $role)
    {

    }

    public function massDestroy(Request $request)
    {

    }
}
