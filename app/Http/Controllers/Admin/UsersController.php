<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index(User $user)
    {
       $users = User::paginate(20);

       return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255|',
            'email' => 'required|max:255|'
        ]);
        $user = User::create($request->all());
        $role_ids = $request->input('role_id');
        $user->roles()->attach($role_ids);
        $user->save();
        return redirect(route('users.index'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit')->with('user',$user)->with('roles',$roles);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' =>'required|max:255',
            'email'=> 'required|max:255',
            'password'=>'required'
        ]);

        $role_ids = $request->input('role_id');
        $user->roles()->sync($role_ids);
        $input = [
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>$request->password
        ];
        $user->update($input);
        return redirect(route('users.index'))->with('success','The record was updated');
    }

    public function show(User $user)
    {

    }

    public function destroy($id)
    {
        $u = User::findOrFail($id);
        $u->delete();
        return redirect(route('users.index'))->with('success','Record was deleted');
    }

    public function massDestroy(Request $request)
    {

    }
}
