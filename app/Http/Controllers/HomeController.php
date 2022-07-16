<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $this->authorize('viewAny', Post::class);
        $posts = Post::latest()->get();
        $users = User::latest()->get();
        $permissions = Role::WhereRelation('permissions', 'name', '=','manage_posts')->get();
        $roles = Auth::user()->role->name;
        
        return view('backend.pages.dashboard', compact('posts', 'users', 'permissions', 'roles'));
    }
}