<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        $roles = Role::get();
        return view('backend.pages.account', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect()->back()->with('success', 'Akun berhasil ditambahkan');
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('viewAny', User::class);
        if($user->id == 1 && $user->role_id == 1){
            return redirect()->back()->with('error', 'Akun Admin tidak dapat diperbarui dari sini, silahkan membuka menu profile');
        }
        else{
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role_id' => 'required',
            ]);
            User::where('id', $user->id)->update($validatedData);
            return redirect()->back()->with('success', 'Akun barhasil diperbarui');
        } 
    }

    public function destroy(User $user)
    {
        $this->authorize('viewAny', User::class);
        $posts = $user->post()->get();

        if($user->id == 1 && $user->role_id == 1){
            return redirect()->back()->with('error', 'Akun Admin tidak bisa dihapus');
        }else{
            if(isset($posts))
            {
                foreach($posts as $post)
                {
                    $post->user_id = 1;
                    $post->save();
                }
                $user->delete();
            }else{
                User::destroy($user->id);
            }
        return redirect()->back()->with('success', 'Akun berhasil dihapus');
        }  
    }
}