<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $this->authorize('view', Role::class);
        $roles = Role::get();
        $permissions = Permission::get();
        return view('backend.pages.level_account', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required'
        ]);
        Role::create($validatedData)->permissions()->sync($request->permission);
        return redirect()->back()->with('success', 'Level Akun berhasil ditambah.');
    }
    
    public function update(Request $request, Role $role)
    {
        if($role->id <= 4){
            return redirect()->back()->with('error', 'Level Akun Default tidak bisa diubah.');
        }else{
            $validatedData = $request->validate([
                'name' => 'required'
            ]);
            Role::where('id', $role->id)->update($validatedData);
            $role->permissions()->sync($request->permission);
            return redirect()->back()->with('success', 'Level Akun berhasil diubah.');
        }
    }

    public function destroy(Role $role)
    { 
        if($role->id <= 4){
            return redirect()->back()->with('error', 'Level Akun Default tidak bisa dihapus.');
        }else{
            if(isset($role->id)){
                $users = User::WhereRelation('role', 'id', '=', $role->id)->get();
                foreach($users as $user)
                {
                    $user->role_id = 4;
                    $user->save();
                }
            }
            $role->permissions()->detach();
            $role->delete();
            return redirect()->back()->with('success', 'Level Akun berhasil dihapus.');
        }
    }
}