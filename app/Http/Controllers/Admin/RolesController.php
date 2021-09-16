<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\CreateRolesRequest;
use App\Http\Requests\Admin\Roles\UpdateRolesRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;
use App\Models\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }
    public function index(){
        $search = request()->search;
        $roles = Role::with('permissions')->Filter($search)->paginate(20)->withQueryString();
        return view('admin.roles.index',compact('roles'));
    }

    public function create(){
        $permissions=Permission::all();
        return view('admin.roles.form',compact('permissions'));
    }

    public function store(CreateRolesRequest $request){
        $role=Role::create([
            'name'=>$request->name
        ]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success','Success - New Role Created');
    }

    public function edit(Role $role){
        $permissions=Permission::all();
        $role_permissions=$role->permissions->pluck('name')->toArray();
        return view('admin.roles.edit',compact('permissions','role', 'role_permissions'));
    }

    public function update(Role $role,UpdateRolesRequest $request){
        $role->name=$request->name;
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('success','Success - Role Updated');
    }

    public function destroy(Role $role){
        $role->delete();
        return redirect()->back()->with('success','Success - Role Deleted');
    }
}
