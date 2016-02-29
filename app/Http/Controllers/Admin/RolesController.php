<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;

class RolesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('roles-list');

    	$roles = Role::all();

    	return view('Admin.roles.list', ['roles' => $roles]);
    }

    public function show($id)
    {
        $this->authorize('roles-show');

    	$role = Role::findOrFail($id);

    	return view('Admin.roles.show', ['role' => $role]);
    }

    public function create(Request $request)
    {
        $this->authorize('roles-create');

        $roles = Role::all();
        $permissions = Permission::all();

        return view('Admin.roles.create', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $role = new Role;
        $role->name = $request->input('name');
        $role->save();

        \Session::flash('message-success', 'Criado com sucesso, selecione as permissoes');
        return redirect()->route('roles::edit', $role->id);
    }

    public function edit($id)
    {
        $this->authorize('roles-edit');

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('Admin.roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        \Session::flash('message-success', 'Atualizado');
        return redirect()->route('roles::edit', $id);
    }

    public function addPermission(Request $request, $id)
    {
        $this->validate($request, [
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $permission = Permission::findOrFail($request->input('permission'));
        $role->permissions()->save($permission);

        \Session::flash('message-success', 'Permissão adicionada a role: ' . $role->name);
        return redirect()->route('roles::edit', $id);
    }

    public function removePermission($id, $idPermission)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->detach($idPermission);
            
        \Session::flash('message-success', 'Permissão removida');
        return redirect()->route('roles::edit', $id);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if (count($role->users)) {
            \Session::flash('message-error', 'Você não pode deletar uma role que tem usuários.');
        } else {
            $role->delete();
            \Session::flash('message-success', 'Role deletada');
        }

        return redirect()->route('roles::list');
    }
}
