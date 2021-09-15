<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.roles.index');
    }
    
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);                                          //asignando los permisos al rol creado
        return redirect()->route('admin.roles.create')->with('message','role criado com successo');
    }

    
    public function show(Role $role)                    // lo excluimos en admin.php archivo de ruta mejor no jajaj
    {
        return view('admin.roles.show', compact('role'));
    }

    
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
        // return $role;
    }

    
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);                                          //asignando los permisos al rol creado
        return redirect()->route('admin.roles.edit', $role)->with('message','role actualizado com successo');
    }

    
    public function destroy(Role $role)
    {
       $role->delete();
       return redirect()->route('admin.roles.index');
    }
}
