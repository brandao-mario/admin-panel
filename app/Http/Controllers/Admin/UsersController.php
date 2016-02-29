<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;

class UsersController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('users-list');

    	$users = User::all();

    	return view('Admin.users.list', ['users' => $users]);
    }

    public function create()
    {
        $this->authorize('users-create');

        $roles = Role::all();

    	return view('Admin.users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'role' => 'required'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        \Session::flash('message-success', 'Criado com sucesso');
        return redirect()->route('users::list');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        if (Gate::denies('update', $user)) {
            $this->authorize('users-edit');
        }
        
        $roles = Role::all();

        return view('Admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'role' => 'required'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        \Session::flash('message-success', 'Atualizado com sucesso');
        return redirect()->route('users::list');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        \Session::flash('message-success', 'Deletado com sucesso');
        return redirect()->route('users::list'); 
    }
}
