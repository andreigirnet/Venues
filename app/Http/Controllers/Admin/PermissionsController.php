<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    public function create()
    {

        return view('admin.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->all());
        $permission->save();
        return redirect(route('permissions.index'))->with('success','Permission created');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect(route('permissions.index'))->with('success','Permission updated');
    }

    public function show(Permission $permission)
    {

    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect(route('permissions.index'))->with('success','Permission deleted');
    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {

    }
}
